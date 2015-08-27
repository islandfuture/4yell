-- Result: get last value
SELECT `data`.`type`, `data`.`value`
FROM `data`
    INNER JOIN (
        SELECT `type`,MAX(`date`) AS lastdate FROM `data` GROUP BY `type`
    ) AS lastdata
    ON (`data`.`date` = `lastdata`.`lastdate` AND `data`.`type`=`lastdata`.`type`)

