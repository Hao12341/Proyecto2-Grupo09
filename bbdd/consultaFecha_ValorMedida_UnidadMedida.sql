SELECT mediciones.fecha, mediciones.Medida, unidades.Unidad
FROM mediciones 
JOIN sensores ON mediciones.idMediciones = sensores.idMediciones
JOIN unidades ON sensores.Unidades = unidades.IdUnidades
JOIN sondas ON sensores.NumSonda = sondas.IdSonda
WHERE sondas.NumHuerto = 1;
