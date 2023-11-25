BEGIN

set @rank = 0;
set @val = 0;
set @cat := '';
set @inv_rnk := '';
set @inv_grd := '';
set @grp_rnk := '';
set @grp_grd := '';

DROP TABLE IF EXISTS `idv_table`;
DROP TABLE IF EXISTS `grp_table`;
DROP TABLE IF EXISTS `biblia_table`;

CREATE TEMPORARY TABLE idv_table (CATEGORY VARCHAR(255), FULL_NAME VARCHAR(255), PARISH VARCHAR(255), FORANE VARCHAR(255), rkpoint INT(15), grdpoint INT(15), points INT(15));
CREATE TEMPORARY TABLE grp_table (FULL_NAME VARCHAR(255), PARISH VARCHAR(255), FORANE VARCHAR(255), rkpoint INT(15), grdpoint INT(15), points INT(15));
CREATE TEMPORARY TABLE biblia_table (CATEGORY VARCHAR(255), FULL_NAME VARCHAR(255), PARISH VARCHAR(255), FORANE VARCHAR(255), idv_rkpoint INT(15), idv_grdpoint INT(15), idv_points INT(15), grp_rkpoint INT(15), grp_grdpoint INT(15),  grp_points INT(15));

INSERT INTO idv_table
SELECT e.CATEGORY, 
        md.FULL_NAME, 
        md.PARISH, 
        md.FORANE, 
        SUM(md.RANK_POINTS) as i_rkpoint, 
        SUM(md.GRADE_POINTS) as i_grdpoint, 
        SUM(md.POINTS) as i_points FROM `master_data` md 
JOIN `events` e on e.SECTION = md.SECTION AND e.STATUS='PUBLISHED' 
        WHERE e.CATEGORY <> 'Group' 
        GROUP BY CATEGORY, FULL_NAME, PARISH, FORANE 
        ORDER BY SUM(md.RANK_POINTS) DESC, SUM(md.GRADE_POINTS) DESC, SUM(md.POINTS) DESC;

INSERT INTO grp_table
SELECT gd.FULL_NAME, 
        gd.PARISH, 
        gd.FORANE, 
        SUM(gmd.RANK_POINTS) as g_rkpoint, 
        SUM(gmd.GRADE_POINTS) as g_grdpoint, 
        SUM(gmd.POINTS) as g_points FROM `group_data` gd 
JOIN `master_data` gmd on gd.CHEST_NO = gmd.CHEST_NO 
GROUP BY gd.FULL_NAME, gd.PARISH, gd.FORANE;

INSERT INTO biblia_table
SELECT idv.CATEGORY, idv.FULL_NAME, idv.PARISH, idv.FORANE, 
        idv.rkpoint AS idv_rkpoint,
        idv.grdpoint AS idv_grdpoint,
        idv.points  AS idv_points,
        ifnull(grp.rkpoint,0) AS grp_rkpoint,
        ifnull(grp.grdpoint,0) AS grp_grdpoint,
        ifnull(grp.points,0) AS grp_rkpoints
        -- idv.rkpoint + ifnull(grp.rkpoint,0), 
        -- idv.grdpoint + ifnull(grp.grdpoint, 0), 
        -- idv.points + ifnull(grp.points, 0)
FROM idv_table idv
        LEFT JOIN grp_table grp on grp.FULL_NAME = idv.FULL_NAME AND grp.PARISH = idv.PARISH AND grp.FORANE = idv.FORANE
ORDER BY idv.CATEGORY;

SELECT CATEGORY, FULL_NAME, PARISH, FORANE, idv_rkpoint, idv_grdpoint, denseRANK
FROM (
        SELECT CATEGORY, FULL_NAME, PARISH, FORANE, idv_rkpoint, idv_grdpoint, grp_rkpoint, grp_grdpoint,
                @rank := if(@cat=CATEGORY, if(@inv_rnk=idv_rkpoint, if(@inv_grd=idv_grdpoint, if(@grp_rnk = grp_rkpoint, if(@grp_grd = grp_grdpoint, @rank, @rank + @val), @rank + @val), @rank + @val), @rank + @val), 1) as denseRank,
                @val := if(@cat=CATEGORY, 
                                if(@inv_rnk=idv_rkpoint, 
                                        if(@inv_grd=idv_grdpoint, 
                                                if(@grp_rnk = grp_rkpoint,
                                                        if(@grp_grd = grp_grdpoint, @val, @val + 1),
                                                        @val + 1),
                                                @val + 1),
                                        @val + 1),
                                1) as value,
                @cat := CATEGORY,
                @inv_rnk := idv_rkpoint,
                @inv_grd := idv_grdpoint,
                @grp_rnk := grp_rkpoint,
                @grp_grd := grp_grdpoint
        FROM (SELECT CATEGORY, FULL_NAME, PARISH, FORANE, idv_rkpoint, idv_grdpoint, grp_rkpoint, grp_grdpoint FROM biblia_table ORDER BY CATEGORY ASC, idv_rkpoint DESC, idv_grdpoint DESC, grp_rkpoint DESC, grp_grdpoint DESC) A ORDER BY CATEGORY ASC, idv_rkpoint DESC, idv_grdpoint DESC, grp_rkpoint DESC, grp_grdpoint DESC
) B WHERE denseRANK=1 ORDER BY CATEGORY, denseRANK;

END