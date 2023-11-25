BEGIN

set @rn1 =0;
set @sal ='';
set @val =0;

SELECT  id, marks, denseRank FROM (
        SELECT  id, marks,
                @rn1 := if(@sal=marks, @rn1, @rn1+1) as denseRank,
                @val := if(@sal=marks, @val+1, 1) as value,
                @sal := marks
        FROM (SELECT  id, section, marks FROM `master_data` WHERE SECTION = P_SECTION ORDER BY MARKS DESC) A ORDER BY MARKS DESC
    ) B ORDER BY MARKS DESC;
       
END