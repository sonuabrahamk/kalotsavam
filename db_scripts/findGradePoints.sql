BEGIN

UPDATE `master_data` SET MARKS=(JUDGE_1 + JUDGE_2 + JUDGE_3),
	GRADE = (CASE 
       WHEN ((JUDGE_1 + JUDGE_2 + JUDGE_3) >= 240) THEN ('A')
       WHEN (((JUDGE_1 + JUDGE_2 + JUDGE_3) < 240) AND ((JUDGE_1 + JUDGE_2 + JUDGE_3) >= 225)) THEN 'B'
       WHEN (((JUDGE_1 + JUDGE_2 + JUDGE_3) < 225) AND ((JUDGE_1 + JUDGE_2 + JUDGE_3) >= 210)) THEN 'C'
       ELSE '-' END),
    GRADE_POINTS = (
					CASE 
						WHEN (SECTION LIKE '%-G%') THEN
							CASE 
								WHEN ((JUDGE_1 + JUDGE_2 + JUDGE_3) >= 240) THEN 10
								WHEN (((JUDGE_1 + JUDGE_2 + JUDGE_3) < 240) AND ((JUDGE_1 + JUDGE_2 + JUDGE_3) >= 225)) THEN 5
								WHEN (((JUDGE_1 + JUDGE_2 + JUDGE_3) < 225) AND ((JUDGE_1 + JUDGE_2 + JUDGE_3) >= 210)) THEN 3
								ELSE 0 
							END
						ELSE
							CASE 
								WHEN ((JUDGE_1 + JUDGE_2 + JUDGE_3) >= 240) THEN 5
								WHEN (((JUDGE_1 + JUDGE_2 + JUDGE_3) < 240) AND ((JUDGE_1 + JUDGE_2 + JUDGE_3) >= 225)) THEN 3
								WHEN (((JUDGE_1 + JUDGE_2 + JUDGE_3) < 225) AND ((JUDGE_1 + JUDGE_2 + JUDGE_3) >= 210)) THEN 1
								ELSE 0 
							END
						END							
					)
WHERE SECTION = F_SECTION AND STATUS='PRESENT';

commit;

END