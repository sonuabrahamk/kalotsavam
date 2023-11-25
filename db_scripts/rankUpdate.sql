BEGIN

set @rn1 =0;
set @sal ='';
set @val =0;

DROP TABLE IF EXISTS `ranktable`;

CREATE TEMPORARY TABLE ranktable (ID VARCHAR(15),RANKVAL INT(10));

INSERT INTO ranktable
SELECT  id, denseRank FROM (
        SELECT  id, marks,
                @rn1 := if(@sal=marks, @rn1, @rn1+1) as denseRank,
                @val := if(@sal=marks, @val+1, 1) as value,
                @sal := marks
        FROM (SELECT  id, section, marks FROM `master_data` WHERE SECTION = P_SECTION AND STATUS='PRESENT' ORDER BY MARKS DESC) A ORDER BY MARKS DESC
    ) B ORDER BY MARKS DESC;
       
UPDATE `master_data` md SET md.RANK = (SELECT RANKVAL FROM ranktable rk WHERE md.id = rk.id) WHERE SECTION=P_SECTION AND STATUS='PRESENT';

END