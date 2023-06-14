SELECT mediciones.fecha, mediciones.Medida, unidades.Unidad
FROM mediciones 
JOIN sensores ON mediciones.IdSensor = sensores.IdSensor
JOIN unidades ON sensores.Unidades = unidades.IdUnidades
JOIN sondas ON sensores.NumSonda = sondas.IdSonda
WHERE sondas.NumHuerto = 1;
