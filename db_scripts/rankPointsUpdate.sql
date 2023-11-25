BEGIN

update `master_data` SET
	RANK_POINTS = (
		CASE
			WHEN (SECTION LIKE '%-G%') THEN
				CASE 
					WHEN (RANK = 1) THEN 10
					WHEN (RANK = 2) THEN 5
					WHEN (RANK = 3) THEN 3
					ELSE 0 
				END
			ELSE
				CASE 
					WHEN (RANK = 1) THEN 5
					WHEN (RANK = 2) THEN 3
					WHEN (RANK = 3) THEN 1
					ELSE 0 
				END
			END
    )
WHERE SECTION = P_SECTION AND STATUS='PRESENT';

END