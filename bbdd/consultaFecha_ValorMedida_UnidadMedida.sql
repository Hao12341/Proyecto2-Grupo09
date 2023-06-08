SELECT m.fecha, m.Medida, u.Unidad
FROM mediciones AS m
JOIN sensores AS s ON m.idMediciones = s.idMediciones
JOIN unidades AS u ON s.Unidades = u.IdUnidades
WHERE m.idMediciones = 1;
