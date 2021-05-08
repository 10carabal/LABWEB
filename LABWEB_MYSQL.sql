-- phpMyAdmin SQL Dump
-- version 4.9.5
-- https://www.phpmyadmin.net/
--
-- Host: localhost:8889
-- Generation Time: Oct 19, 2020 at 11:41 PM
-- Server version: 5.7.30
-- PHP Version: 7.4.9

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";

--
-- Database: `BDlab`
--

-- --------------------------------------------------------

--
-- Table structure for table `Tb_adquisicion_equipos`
--

CREATE TABLE `Tb_adquisicion_equipos` (
  `NUM_HOJA_VIDA` double DEFAULT NULL,
  `FECHA_COMPRA` datetime DEFAULT NULL,
  `FECHA_FABRICACION` datetime DEFAULT NULL,
  `FECHA_INSTALACION` datetime DEFAULT NULL,
  `FECHA_INICIO_OPERACION` datetime DEFAULT NULL,
  `COSTO_EQUIPO` decimal(38,0) DEFAULT '0',
  `FORMA_ADQUISICION` set('Compra Directa','Donación','Asignación','Comodato','Alquiler') NOT NULL DEFAULT 'Compra Directa',
  `FECHA_ACTA_RECIBOS` datetime DEFAULT NULL,
  `GARANTIA_AÑOS` decimal(38,0) DEFAULT '0',
  `ESTADO_GARANTIA` varchar(110) DEFAULT 'N/P',
  `FIN_GARANTIA` datetime DEFAULT NULL,
  `ESTADO_ACTUAL` varchar(110) DEFAULT 'N/P',
  `AÑOS_USO` decimal(38,0) DEFAULT '0',
  `FACTURA` varchar(110) DEFAULT 'N/P',
  `VIDA_UTIL` decimal(38,0) DEFAULT '0',
  `RAZON_VIDA_UTIL` varchar(110) DEFAULT 'N/P',
  `FECHA_INGRESO_INVENTARIO` datetime DEFAULT NULL,
  `EJECUTOR_HOJA_VIDA` varchar(110) NOT NULL DEFAULT 'N/P',
  `LIDER_PROCESO` varchar(110) NOT NULL DEFAULT 'N/P',
 `CREATED_AT` datetime DEFAULT NULL,
  `UPDATED_AT` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `Tb_Clasificacion_Equipo`
--

CREATE TABLE `Tb_Clasificacion_Equipo` (
  `NUM_HOJA_VIDA` double DEFAULT NULL,
  `CLASIFICACIÓN_DE_EQUIPO` set('Médico','Odontológico','Laboratorio','Simulación') NOT NULL DEFAULT 'Médico',
  `CLASIFICACION_USO` varchar(110) DEFAULT 'N/P',
  `CLASIFICACION_BIOMEDICA` set('Diagnóstico','Prevención','Rehabilitación','Análisis de Laboratorio','Tratamiento y Mantenimiento de la Vida') NOT NULL DEFAULT 'Diagnóstico',
  `TECNOLOGIA_PREDOMINANTE` set('Mecánico','Eléctrico','Electrónico','Hidráulico','Neumático') NOT NULL DEFAULT 'Mecánico',
  `CLASIFICACION_RIESGO` set('Muy Alto Riesgo III','Alto Riesgo IIB','Moderado Riesgo II A','Bajo Riesgo I') NOT NULL DEFAULT 'Bajo Riesgo I',
  `CLASE_RIESGO_ELECTRICO` varchar(110) DEFAULT 'N/P',
  `TIPO_RIESGO_ELECTRICO` varchar(110) DEFAULT 'N/P',
  `CLASES_SOFTWARE` set('Programación','Sistema','Aplicación') NOT NULL DEFAULT 'Programación',
  `COMPLEJIDAD_TECNOLOGICA_EQUIPO` varchar(110) DEFAULT 'N/P',
  `CICLO_MANTENIMIENTO` set('3 Meses','4 Meses','6 Meses','12 Meses') NOT NULL DEFAULT '12 Meses',
  `CICLO_CALIB_VALID_CALPERSONAL` set('3 Meses','4 Meses','6 Meses','12 Meses') NOT NULL DEFAULT '12 Meses',
 `CREATED_AT` datetime DEFAULT NULL,
  `UPDATED_AT` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `Tb_Cron_Plan_Mento_Equipos`
--

CREATE TABLE `Tb_Cron_Plan_Mento_Equipos` (
  `NUM_HOJA_VIDA` double DEFAULT NULL,
  `FREC_MENTO_PREVENTIVO` set('3 Meses','4 Meses','6 Meses','12 Meses') NOT NULL DEFAULT '12 Meses',
  `FECHA_EJECUCION` datetime NOT NULL,
  `ESTADO_EJECUCION` varchar(110) DEFAULT 'N/P',
  `RESPONSABLE_MANTENIMIENTO` varchar(110) DEFAULT 'N/P',
  `OBSERVACIONES_EQUIPO` varchar(1100) DEFAULT 'N/P',
  `COSTO_MANTENIMIENTO` double DEFAULT NULL,
  `NUM_REPORTE_SERVICIO` double NOT NULL,
 `CREATED_AT` datetime DEFAULT NULL,
  `UPDATED_AT` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `Tb_Cron_Pl_Calib_Valid_CalPnal`
--

CREATE TABLE `Tb_Cron_Pl_Calib_Valid_CalPnal` (
  `NUM_HOJA_VIDA` double DEFAULT NULL,
  `FCIA_VACION_CALIB` set('3 Meses','4 Meses','6 Meses','12 Meses') NOT NULL DEFAULT '12 Meses',
  `FECHA_EJECUCION` datetime NOT NULL,
  `ESTADO_EJECUCION` varchar(110) DEFAULT 'N/P',
  `OBSERVACIONES_EQUIPO` varchar(1100) DEFAULT 'N/P',
  `NUM_REPORTE_SERVICIO` double NOT NULL,
 `CREATED_AT` datetime DEFAULT NULL,
  `UPDATED_AT` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `Tb_Documentacion_Proveedor`
--

CREATE TABLE `Tb_Documentacion_Proveedor` (
  `NUM_HOJA_VIDA` double NOT NULL,
  `MANUAL_USUARIO` set('Si','No','N/P') NOT NULL DEFAULT 'N/P',
  `MANUAL_SERVICIO` set('Si','No','N/P') NOT NULL DEFAULT 'N/P',
  `GUIA_USO` set('Si','No','N/P') NOT NULL DEFAULT 'N/P',
  `MANUAL_PARTES` set('Si','No','N/P') NOT NULL DEFAULT 'N/P',
  `MANUAL_DESPIECE` set('Si','No','N/P') NOT NULL DEFAULT 'N/P',
  `PLANOS` set('Si','No','N/P') NOT NULL DEFAULT 'N/P',
  `CARTA_GARANTIA` set('Si','No','N/P') NOT NULL DEFAULT 'N/P',
  `REGISTRO_SANITARIO_PROVEEDOR` set('Si','No','N/P') NOT NULL DEFAULT 'N/P',
  `DECLARACION_IMPORTACION` set('Si','No','N/P') NOT NULL DEFAULT 'N/P',
  `CHECKLIST_FABRICACION` set('Si','No','N/P') NOT NULL DEFAULT 'N/P',
  `HOJAS_VIDA_PERSONAL_TECNICO` set('Si','No','N/P') NOT NULL DEFAULT 'N/P',
  `CRONOGRAMA_VISITAS` set('Si','No','N/P') NOT NULL DEFAULT 'N/P',
  `REPUESTOS_DISPONIBLES` set('Si','No','N/P') NOT NULL DEFAULT 'N/P',
  `CERT_CALIB_VALID_CALPERSONAL` set('Si','No','N/P') NOT NULL DEFAULT 'N/P',
 `CREATED_AT` datetime DEFAULT NULL,
  `UPDATED_AT` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `Tb_Docum_Anexos_HV`
--

CREATE TABLE `Tb_Docum_Anexos_HV` (
  `NUM_HOJA_VIDA` double NOT NULL,
  `COPIA_REGISTRO_SANITARIO` varchar(110) NOT NULL DEFAULT 'No aplica',
  `COPIA_REGISTRO_IMPORTACION` set('Anexo','No Anexo','No aplica') NOT NULL DEFAULT 'No aplica',
  `COPIA_PMISO_COMERCIALIZACION` set('Anexo','No Anexo','No aplica') NOT NULL DEFAULT 'No aplica',
  `COPIA_FACTURA` set('Anexo','No Anexo','No aplica') NOT NULL DEFAULT 'No aplica',
  `COPIA_INGRESO_ALMACEN` set('Anexo','No Anexo','No aplica') NOT NULL DEFAULT 'No aplica',
  `CP_RBO_SATISFACCION_PRESTADOR` set('Anexo','No Anexo','No aplica') NOT NULL DEFAULT 'No aplica',
  `CP_RBO_SATISFACCION_OPERADOR` set('Anexo','No Anexo','No aplica') NOT NULL DEFAULT 'No aplica',
  `CAPACION_TEC_ASISTENCIAL` set('Anexo','No Anexo','No aplica') NOT NULL DEFAULT 'No aplica',
  `HOJA_VIDA_PERSONAL_TECNICO` set('Anexo','No Anexo','No aplica') NOT NULL DEFAULT 'No aplica',
  `CERT_CALIB_VALID_CALPERSONAL` set('Anexo','No Anexo','No aplica') NOT NULL DEFAULT 'No aplica',
  `RNES_FABRICANTE_CALIBRACION` set('Anexo','No Anexo','No aplica') NOT NULL DEFAULT 'No aplica',
  `RNES_FABRICANTE_ACEOS_CBLES` set('Anexo','No Anexo','No aplica') NOT NULL DEFAULT 'No aplica',
  `PROTOCOLO_MANTENIMIENTO_T_G` set('Anexo','No Anexo','No aplica') NOT NULL DEFAULT 'No aplica',
  `OBSERVACIONES` varchar(500) DEFAULT NULL,
 `CREATED_AT` datetime DEFAULT NULL,
  `UPDATED_AT` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `Tb_equipos`
--

CREATE TABLE `Tb_equipos` (
  `NUM_HOJA_VIDA` double NOT NULL,
  `Nombre` varchar(110) NOT NULL DEFAULT 'N/P',
  `Imagen_Equipo` varchar(110) NOT NULL DEFAULT 'N/P',
  `Marca` varchar(110) NOT NULL DEFAULT 'N/P',
  `Modelo` varchar(110) DEFAULT 'N/P',
  `Serial` varchar(110) DEFAULT 'N/P',
  `Activo_Fijo` varchar(110) DEFAULT 'N/P',
  `Area` varchar(110) DEFAULT 'N/P',
  `Sub_Area` varchar(110) DEFAULT 'N/P',
  `Registro_Sanitario` set('Si','No') NOT NULL DEFAULT 'No',
  `Permiso_Comercializacion` set('Si','No') NOT NULL DEFAULT 'No',
  `No_Requiere` set('Si','No') NOT NULL DEFAULT 'No',
 `CREATED_AT` datetime DEFAULT NULL,
  `UPDATED_AT` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `Tb_Fabricantes_Proveedores`
--

CREATE TABLE `Tb_Fabricantes_Proveedores` (
  `NUM_HOJA_VIDA` double DEFAULT NULL,
  `FABRICANTE` varchar(110) DEFAULT 'N/P',
  `PAIS_ORIGEN` varchar(110) DEFAULT 'N/P',
  `WEB_FABRICANTE` varchar(110) DEFAULT 'N/P',
  `REPRESENTANTE` varchar(110) DEFAULT 'N/P',
  `PROVEEDOR` varchar(110) DEFAULT 'N/P',
  `CIUDAD_PROVEEDOR` varchar(110) DEFAULT 'N/P',
  `DIRECCION_PROVEEDOR` varchar(110) DEFAULT 'N/P',
  `TELEFONO_PROVEEDOR` double DEFAULT NULL,
  `CORREO_PROVEEDOR` varchar(110) DEFAULT 'N/P',
  `WEB_PROVEEDOR` varchar(110) DEFAULT 'N/P',
 `CREATED_AT` datetime DEFAULT NULL,
  `UPDATED_AT` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `Tb_Generalidades_Equipo`
--

CREATE TABLE `Tb_Generalidades_Equipo` (
  `NUM_HOJA_VIDA` double NOT NULL,
  `Tipo_Mantenimiento` varchar(1110) DEFAULT 'N/P',
  `Fuentes_Alimentacion` set('Agua','Aire','Gas','Vapor','Electricidad') NOT NULL DEFAULT 'Electricidad',
  `Clasificacion_Uso` set('Médico','Básico','Ensayo','Laboratorio','Apoyo') NOT NULL DEFAULT 'Médico',
  `Freccia_Calib_Valid_CalPernal` varchar(110) DEFAULT 'N/P',
  `Freccia_Mantenimiento` varchar(110) DEFAULT 'N/P',
  `Recomendaciones_Fabricantes` varchar(1110) DEFAULT 'N/P',
 `CREATED_AT` datetime DEFAULT NULL,
  `UPDATED_AT` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `Tb_Hist_Solicitudes_Equipo`
--

CREATE TABLE `Tb_Hist_Solicitudes_Equipo` (
  `NUM_HOJA_VIDA` double DEFAULT NULL,
  `Consecutivo_Orden` double DEFAULT NULL,
  `Tipo_Servicio` varchar(1110) DEFAULT 'N/P',
  `Costo` varchar(1110) DEFAULT 'N/P',
  `Repuestos` varchar(1110) DEFAULT 'N/P',
  `Observaciones` varchar(1110) DEFAULT 'N/P',
  `Nombre_Responsable` varchar(1110) DEFAULT 'N/P',
  `Cargo_Responsable` varchar(1110) DEFAULT 'N/P',
  `Nombre_Responsable_Reporte` varchar(1110) DEFAULT 'N/P',
  `Satisfaccion_Usuario` varchar(1110) DEFAULT 'N/P',
 `CREATED_AT` datetime DEFAULT NULL,
  `UPDATED_AT` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `Tb_Informacion_Institucional`
--

CREATE TABLE `Tb_Informacion_Institucional` (
  `NUM_HOJA_VIDA` double NOT NULL,
  `Pais` varchar(110) NOT NULL DEFAULT 'Colombia',
  `Ciudad` varchar(1110) NOT NULL DEFAULT 'Cali',
  `Direccion` varchar(1110) NOT NULL DEFAULT 'Calle 5 # 62-00 Barrio Pampalinda',
  `Nit_Universidad` varchar(1110) NOT NULL DEFAULT '890303787-1',
  `RUT` varchar(1110) NOT NULL DEFAULT '890303787-1',
  `Telefono` varchar(1110) NOT NULL DEFAULT '5183000 EXT',
  `Website` varchar(1110) NOT NULL DEFAULT 'www.usc.edu.co',
  `Email_Laboratorio` varchar(1110) DEFAULT 'N/P',
  `Fecha_Ejecucion_Hoja_Vida` datetime NOT NULL,
  `Lider_Proceso` varchar(1110) NOT NULL DEFAULT 'N/P',
  `Cargo` varchar(1110) NOT NULL DEFAULT 'N/P',
 `CREATED_AT` datetime DEFAULT NULL,
  `UPDATED_AT` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `Tb_Informacion_Tecnica_Equipo`
--

CREATE TABLE `Tb_Informacion_Tecnica_Equipo` (
  `NUM_HOJA_VIDA` double DEFAULT NULL,
  `Codigo_ECRI` varchar(110) DEFAULT 'N/P',
  `Nomenclatura_Internacional` varchar(1110) DEFAULT 'N/P',
  `Nomenclatura` varchar(1110) DEFAULT 'N/P',
  `Tipo_Equipo` set('Móvil','Fijo') NOT NULL DEFAULT 'Móvil',
  `Firmware` set('Si','No') NOT NULL DEFAULT 'No',
  `Software` set('Si','No') NOT NULL DEFAULT 'No',
  `Rango_Voltaje` double DEFAULT NULL,
  `Corriente` double DEFAULT NULL,
  `Potencia` double DEFAULT NULL,
  `Frecuencia_(HZ)` double DEFAULT NULL,
  `Dimensiones_(CM)` double DEFAULT NULL,
  `Presion` double DEFAULT NULL,
  `Temperatura` double DEFAULT NULL,
  `Peso_KGS` double DEFAULT NULL,
  `Humedad` double DEFAULT NULL,
  `RPM` double DEFAULT NULL,
  `Descripcion_Equipo` varchar(1110) DEFAULT 'N/P',
 `CREATED_AT` datetime DEFAULT NULL,
  `UPDATED_AT` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `Tb_Informe_Mantenimiento`
--

CREATE TABLE `Tb_Informe_Mantenimiento` (
  `NUM_HOJA_VIDA` double NOT NULL,
  `Consecutivo_Orden` double DEFAULT NULL,
  `Tipo_Mantenimiento` varchar(110) DEFAULT 'N/P',
  `Imagen_Antes_Mantenimiento` varchar(1110) DEFAULT 'N/P',
  `Imagen_Despues_Mantenimiento` varchar(1110) DEFAULT 'N/P',
  `Fecha_Mantenimiento` datetime DEFAULT NULL,
  `Hora_Inicio` double DEFAULT NULL,
  `Hora_Fin` double DEFAULT NULL,
  `Tipo_Equipo` set('Médico','Odontológico','Laboratorio','Simulación') NOT NULL DEFAULT 'Médico',
  `Actividades_Realizadas` varchar(1110) DEFAULT 'N/P',
  `Observacion_Mantenimiento` varchar(1110) DEFAULT 'N/P',
  `Estado_Equipo` varchar(1110) DEFAULT 'N/P',
  `Test_Funcionalidad` varchar(1110) DEFAULT 'N/P',
  `Limpieza` varchar(110) DEFAULT 'N/P',
  `Reemplazo_Accesorios` varchar(1110) DEFAULT 'N/P',
  `Herramientas_Utilizadas` varchar(1110) DEFAULT 'N/P',
  `Equipo_Proteccion_Personal` varchar(1110) DEFAULT 'N/P',
  `Nombre_Responsable_Mento` varchar(110) DEFAULT 'N/P',
  `Cargo_Responsable_Mento` varchar(110) DEFAULT 'N/P',
  `Nombre_Responsable_Recibir` varchar(110) DEFAULT 'N/P',
  `Cargo_Responsable_Recibir` varchar(110) DEFAULT 'N/P',
 `CREATED_AT` datetime DEFAULT NULL,
  `UPDATED_AT` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `Tb_Informe_Servicio_Tecnico`
--

CREATE TABLE `Tb_Informe_Servicio_Tecnico` (
  `NUM_HOJA_VIDA` double DEFAULT NULL,
  `Consecutivo_Orden` double DEFAULT NULL,
  `Codigo_Prestador` varchar(110) DEFAULT 'N/P',
  `Servicio` varchar(110) DEFAULT 'N/P',
  `Ubicacion` varchar(110) DEFAULT 'N/P',
  `Fecha_Informe` datetime DEFAULT NULL,
  `Problema_Detectado` varchar(1110) DEFAULT 'N/P',
  `Actividades_Realizadas` varchar(1110) DEFAULT 'N/P',
  `Repuestos_Instalados` varchar(1110) DEFAULT 'N/P',
  `Accesorios_Instalados` varchar(1110) DEFAULT 'N/P',
  `Insumos_Instalados` varchar(1110) DEFAULT 'N/P',
  `Mediciones` varchar(110) DEFAULT 'N/P',
  `Observaciones` varchar(1110) DEFAULT 'N/P',
  `Nombre_Responsable` varchar(110) DEFAULT 'N/P',
  `Cargo_Responsable` varchar(110) DEFAULT 'N/P',
  `Nombre_Responsable_Recibir` varchar(110) DEFAULT 'N/P',
  `Cargo_Responsable_Recibir` varchar(110) DEFAULT 'N/P',
 `CREATED_AT` datetime DEFAULT NULL,
  `UPDATED_AT` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `Tb_Insp_Funcionalidad_Equipos`
--

CREATE TABLE `Tb_Insp_Funcionalidad_Equipos` (
  `NUM_HOJA_VIDA` double NOT NULL,
  `Consecutivo_Orden` double DEFAULT NULL,
  `Laboratorio` varchar(110) DEFAULT 'N/P',
  `Fecha_Ejecucion` datetime DEFAULT NULL,
  `Nombre_Responsable` varchar(110) NOT NULL DEFAULT 'N/P',
  `Cargo_Responsable` varchar(110) NOT NULL DEFAULT 'N/P',
  `Funcionamiento_Equipo` set('BE Buen Estado','ME Mal Estado','NA no Aplica') NOT NULL DEFAULT 'BE Buen Estado',
  `Estado_Entorno` set('BE Buen Estado','ME Mal Estado','NA no Aplica') NOT NULL DEFAULT 'BE Buen Estado',
  `Estado_Accesorio_Consumibles` set('BE Buen Estado','ME Mal Estado','NA no Aplica') NOT NULL DEFAULT 'BE Buen Estado',
  `Estado_lineas_Alimentacion` set('BE Buen Estado','ME Mal Estado','NA no Aplica') NOT NULL DEFAULT 'BE Buen Estado',
  `Estado_Almacenamiento` set('BE Buen Estado','ME Mal Estado','NA no Aplica') NOT NULL DEFAULT 'BE Buen Estado',
  `Documentacion_Presente` set('BE Buen Estado','ME Mal Estado','NA no Aplica') NOT NULL DEFAULT 'BE Buen Estado',
 `CREATED_AT` datetime DEFAULT NULL,
  `UPDATED_AT` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `Tb_Mantenimiento_Equipos`
--

CREATE TABLE `Tb_Mantenimiento_Equipos` (
  `NUM_HOJA_VIDA` double DEFAULT NULL,
  `Mantenimiento_Propio` set('Si','No') NOT NULL DEFAULT 'No',
  `Mantenimiento_Contratado` set('Si','No') NOT NULL DEFAULT 'No',
  `Por_Orden_Compra` set('Si','No') NOT NULL DEFAULT 'No',
  `Requiere_Calibracion` set('Si','No') NOT NULL DEFAULT 'No',
  `Requiere_Cal_Operacional` set('Si','No') NOT NULL DEFAULT 'No',
  `Requiere_Validacion` set('Si','No') NOT NULL DEFAULT 'No',
 `CREATED_AT` datetime DEFAULT NULL,
  `UPDATED_AT` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `Tb_Matriz_Segto_Solicitudes`
--

CREATE TABLE `Tb_Matriz_Segto_Solicitudes` (
  `Consecutivo_Orden` double DEFAULT NULL,
  `Fecha_Solicitud` datetime DEFAULT NULL,
  `Descripcion_Solicitud` varchar(1110) DEFAULT 'N/P',
  `CDIS_Presupuesto` double DEFAULT NULL,
  `Fecha_Ejecucion` datetime DEFAULT NULL,
  `Resultado_Ejecucion` varchar(110) DEFAULT 'N/P',
  `Personal_Encargado` varchar(110) DEFAULT 'N/P',
  `Satisfacion_Solicitud` double DEFAULT NULL,
  `Total_Solicitudes` double DEFAULT NULL,
 `CREATED_AT` datetime DEFAULT NULL,
  `UPDATED_AT` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `Tb_Observaciones_Adicionales`
--

CREATE TABLE `Tb_Observaciones_Adicionales` (
  `NUM_HOJA_VIDA` double DEFAULT NULL,
  `Fecha_Observacion` datetime DEFAULT NULL,
  `Observacion` varchar(1110) DEFAULT 'N/P',
  `Responsable_Observacion` varchar(110) DEFAULT 'N/P',
 `CREATED_AT` datetime DEFAULT NULL,
  `UPDATED_AT` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `Tb_Perfil_Usuario`
--

CREATE TABLE `Tb_Perfil_Usuario` (
  `NUM_PERFIL` double DEFAULT NULL,
  `DESCRIPCION_PERFIL` set('Administrador','Empleado') NOT NULL DEFAULT 'Empleado',
 `CREATED_AT` datetime DEFAULT NULL,
  `UPDATED_AT` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `Tb_Reactivos_Accesorios`
--

CREATE TABLE `Tb_Reactivos_Accesorios` (
  `NUM_HOJA_VIDA` double NOT NULL,
  `LISTADO_REACTIVOS` varchar(110) DEFAULT 'N/P',
  `LISTADO_ACCESORIOS` varchar(110) DEFAULT 'N/P',
  `NOMBRE_ACCESORIO` varchar(110) DEFAULT 'N/P',
  `MARCA_LICENCIA_ACCESORIO` varchar(110) DEFAULT 'N/P',
  `MODELO_VERSION_ACCESORIO` varchar(110) DEFAULT 'N/P',
  `SERIE_ACCESORIO` double DEFAULT NULL,
 `CREATED_AT` datetime DEFAULT NULL,
  `UPDATED_AT` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `Tb_Solicitud_Servicio`
--

CREATE TABLE `Tb_Solicitud_Servicio` (
  `NUM_HOJA_VIDA` double DEFAULT NULL,
  `Consecutivo_Orden` double DEFAULT NULL,
  `Fecha_Solicitud_Servicio` datetime DEFAULT NULL,
  `Hora_Solicitud_Servicio` double DEFAULT NULL,
  `Servicio` varchar(110) DEFAULT 'N/P',
  `Ubicacion` varchar(110) DEFAULT 'N/P',
  `Descripcion_Problema` varchar(1100) NOT NULL DEFAULT 'N/P',
  `Nombre_Responsable` varchar(110) DEFAULT 'N/P',
  `Cargo_Responsable` varchar(110) DEFAULT 'N/P',
  `Estado_Servicio` varchar(110) DEFAULT 'N/P',
 `CREATED_AT` datetime DEFAULT NULL,
  `UPDATED_AT` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `Tb_Usuario`
--

CREATE TABLE `Tb_Usuario` (
  `CORREO` double NOT NULL,
  `CLAVE` double NOT NULL,
  `PERFIL` double NOT NULL,
 `CREATED_AT` datetime DEFAULT NULL,
  `UPDATED_AT` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `Tb_adquisicion_equipos`
--
ALTER TABLE `Tb_adquisicion_equipos`
  ADD KEY `NUM_HOJA_VIDA` (`NUM_HOJA_VIDA`);

--
-- Indexes for table `Tb_Clasificacion_Equipo`
--
ALTER TABLE `Tb_Clasificacion_Equipo`
  ADD KEY `NUM_HOJA_VIDA` (`NUM_HOJA_VIDA`);

--
-- Indexes for table `Tb_Cron_Plan_Mento_Equipos`
--
ALTER TABLE `Tb_Cron_Plan_Mento_Equipos`
  ADD KEY `NUM_HOJA_VIDA` (`NUM_HOJA_VIDA`);

--
-- Indexes for table `Tb_Cron_Pl_Calib_Valid_CalPnal`
--
ALTER TABLE `Tb_Cron_Pl_Calib_Valid_CalPnal`
  ADD KEY `NUM_HOJA_VIDA` (`NUM_HOJA_VIDA`);

--
-- Indexes for table `Tb_Documentacion_Proveedor`
--
ALTER TABLE `Tb_Documentacion_Proveedor`
  ADD KEY `NUM_HOJA_VIDA` (`NUM_HOJA_VIDA`);

--
-- Indexes for table `Tb_Docum_Anexos_HV`
--
ALTER TABLE `Tb_Docum_Anexos_HV`
  ADD KEY `NUM_HOJA_VIDA` (`NUM_HOJA_VIDA`);

--
-- Indexes for table `Tb_equipos`
--
ALTER TABLE `Tb_equipos`
  ADD PRIMARY KEY (`NUM_HOJA_VIDA`);

--
-- Indexes for table `Tb_Generalidades_Equipo`
--
ALTER TABLE `Tb_Generalidades_Equipo`
  ADD KEY `NUM_HOJA_VIDA` (`NUM_HOJA_VIDA`);

--
-- Indexes for table `Tb_Informacion_Institucional`
--
ALTER TABLE `Tb_Informacion_Institucional`
  ADD KEY `NUM_HOJA_VIDA` (`NUM_HOJA_VIDA`);

--
-- Indexes for table `Tb_Informacion_Tecnica_Equipo`
--
ALTER TABLE `Tb_Informacion_Tecnica_Equipo`
  ADD KEY `NUM_HOJA_VIDA` (`NUM_HOJA_VIDA`);

--
-- Indexes for table `Tb_Informe_Mantenimiento`
--
ALTER TABLE `Tb_Informe_Mantenimiento`
  ADD KEY `NUM_HOJA_VIDA` (`NUM_HOJA_VIDA`);

--
-- Indexes for table `Tb_Insp_Funcionalidad_Equipos`
--
ALTER TABLE `Tb_Insp_Funcionalidad_Equipos`
  ADD KEY `NUM_HOJA_VIDA` (`NUM_HOJA_VIDA`);

--
-- Indexes for table `Tb_Mantenimiento_Equipos`
--
ALTER TABLE `Tb_Mantenimiento_Equipos`
  ADD KEY `NUM_HOJA_VIDA` (`NUM_HOJA_VIDA`);

--
-- Indexes for table `Tb_Perfil_Usuario`
--
ALTER TABLE `Tb_Perfil_Usuario`
  ADD KEY `NUM_PERFIL` (`NUM_PERFIL`);

--
-- Indexes for table `Tb_Reactivos_Accesorios`
--
ALTER TABLE `Tb_Reactivos_Accesorios`
  ADD KEY `NUM_HOJA_VIDA` (`NUM_HOJA_VIDA`);

--
-- Indexes for table `Tb_Solicitud_Servicio`
--
ALTER TABLE `Tb_Solicitud_Servicio`
  ADD KEY `NUM_HOJA_VIDA` (`NUM_HOJA_VIDA`);

--
-- Indexes for table `Tb_Usuario`
--
ALTER TABLE `Tb_Usuario`
  ADD KEY `PERFIL` (`PERFIL`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `Tb_equipos`
--
ALTER TABLE `Tb_equipos`
  MODIFY `NUM_HOJA_VIDA` double NOT NULL AUTO_INCREMENT;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `Tb_adquisicion_equipos`
--
ALTER TABLE `Tb_adquisicion_equipos`
  ADD CONSTRAINT `tb_adquisicion_equipos_ibfk_1` FOREIGN KEY (`NUM_HOJA_VIDA`) REFERENCES `Tb_equipos` (`NUM_HOJA_VIDA`);

--
-- Constraints for table `Tb_Clasificacion_Equipo`
--
ALTER TABLE `Tb_Clasificacion_Equipo`
  ADD CONSTRAINT `tb_clasificacion_equipo_ibfk_1` FOREIGN KEY (`NUM_HOJA_VIDA`) REFERENCES `Tb_equipos` (`NUM_HOJA_VIDA`);

--
-- Constraints for table `Tb_Cron_Plan_Mento_Equipos`
--
ALTER TABLE `Tb_Cron_Plan_Mento_Equipos`
  ADD CONSTRAINT `tb_cron_plan_mento_equipos_ibfk_1` FOREIGN KEY (`NUM_HOJA_VIDA`) REFERENCES `Tb_equipos` (`NUM_HOJA_VIDA`);

--
-- Constraints for table `Tb_Cron_Pl_Calib_Valid_CalPnal`
--
ALTER TABLE `Tb_Cron_Pl_Calib_Valid_CalPnal`
  ADD CONSTRAINT `tb_cron_pl_calib_valid_calpnal_ibfk_1` FOREIGN KEY (`NUM_HOJA_VIDA`) REFERENCES `Tb_equipos` (`NUM_HOJA_VIDA`);

--
-- Constraints for table `Tb_Documentacion_Proveedor`
--
ALTER TABLE `Tb_Documentacion_Proveedor`
  ADD CONSTRAINT `tb_documentacion_proveedor_ibfk_1` FOREIGN KEY (`NUM_HOJA_VIDA`) REFERENCES `Tb_equipos` (`NUM_HOJA_VIDA`);

--
-- Constraints for table `Tb_Docum_Anexos_HV`
--
ALTER TABLE `Tb_Docum_Anexos_HV`
  ADD CONSTRAINT `tb_docum_anexos_hv_ibfk_1` FOREIGN KEY (`NUM_HOJA_VIDA`) REFERENCES `Tb_equipos` (`NUM_HOJA_VIDA`);

--
-- Constraints for table `Tb_Generalidades_Equipo`
--
ALTER TABLE `Tb_Generalidades_Equipo`
  ADD CONSTRAINT `tb_generalidades_equipo_ibfk_1` FOREIGN KEY (`NUM_HOJA_VIDA`) REFERENCES `Tb_equipos` (`NUM_HOJA_VIDA`);

--
-- Constraints for table `Tb_Informacion_Institucional`
--
ALTER TABLE `Tb_Informacion_Institucional`
  ADD CONSTRAINT `tb_informacion_institucional_ibfk_1` FOREIGN KEY (`NUM_HOJA_VIDA`) REFERENCES `Tb_equipos` (`NUM_HOJA_VIDA`);

--
-- Constraints for table `Tb_Informacion_Tecnica_Equipo`
--
ALTER TABLE `Tb_Informacion_Tecnica_Equipo`
  ADD CONSTRAINT `tb_informacion_tecnica_equipo_ibfk_1` FOREIGN KEY (`NUM_HOJA_VIDA`) REFERENCES `Tb_equipos` (`NUM_HOJA_VIDA`);

--
-- Constraints for table `Tb_Informe_Mantenimiento`
--
ALTER TABLE `Tb_Informe_Mantenimiento`
  ADD CONSTRAINT `tb_informe_mantenimiento_ibfk_1` FOREIGN KEY (`NUM_HOJA_VIDA`) REFERENCES `Tb_equipos` (`NUM_HOJA_VIDA`);

--
-- Constraints for table `Tb_Insp_Funcionalidad_Equipos`
--
ALTER TABLE `Tb_Insp_Funcionalidad_Equipos`
  ADD CONSTRAINT `tb_insp_funcionalidad_equipos_ibfk_1` FOREIGN KEY (`NUM_HOJA_VIDA`) REFERENCES `Tb_equipos` (`NUM_HOJA_VIDA`);

--
-- Constraints for table `Tb_Mantenimiento_Equipos`
--
ALTER TABLE `Tb_Mantenimiento_Equipos`
  ADD CONSTRAINT `tb_mantenimiento_equipos_ibfk_1` FOREIGN KEY (`NUM_HOJA_VIDA`) REFERENCES `Tb_equipos` (`NUM_HOJA_VIDA`);

--
-- Constraints for table `Tb_Perfil_Usuario`
--
ALTER TABLE `Tb_Perfil_Usuario`
  ADD CONSTRAINT `tb_perfil_usuario_ibfk_1` FOREIGN KEY (`NUM_PERFIL`) REFERENCES `Tb_Usuario` (`PERFIL`);

--
-- Constraints for table `Tb_Reactivos_Accesorios`
--
ALTER TABLE `Tb_Reactivos_Accesorios`
  ADD CONSTRAINT `tb_reactivos_accesorios_ibfk_1` FOREIGN KEY (`NUM_HOJA_VIDA`) REFERENCES `Tb_equipos` (`NUM_HOJA_VIDA`);

--
-- Constraints for table `Tb_Solicitud_Servicio`
--
ALTER TABLE `Tb_Solicitud_Servicio`
  ADD CONSTRAINT `tb_solicitud_servicio_ibfk_1` FOREIGN KEY (`NUM_HOJA_VIDA`) REFERENCES `Tb_equipos` (`NUM_HOJA_VIDA`);
