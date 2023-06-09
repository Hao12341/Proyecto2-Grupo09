SELECT
  incidencias.IdIncidencias,
  incidencias.TipoIncidencia,
  incidencias.NivelGravedad,
  nivelgravedad.Valor AS DescripciónGravedad,
  incidencias.Estado,
  incidencias.NumSensor,
  tipossensores.TipoSensor,
  sondas.IdSonda,
  sondas.NumHuerto,
  huertos.UsuarioPropietario,
  usuarios.IdUsuario
FROM incidencias 
JOIN nivelgravedad ON incidencias.NivelGravedad = nivelgravedad.IdNivelGravedad
JOIN sensores ON incidencias.NumSensor = sensores.IdSensor
JOIN tipossensores ON sensores.TipoSensor = tipossensores.IdTipoSensor
JOIN sondas ON sensores.NumSonda = sondas.IdSonda
JOIN huertos ON sondas.NumHuerto = huertos.IdHuerto
JOIN usuarios ON huertos.UsuarioPropietario = usuarios.IdUsuario
WHERE incidencias.NivelGravedad = 4;
