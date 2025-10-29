# 📁 Proyecto 
**Escuela Profesional de Ingeniería de Sistemas e Informática**  
**Tipo:** Proyecto grupal académico  
---

## 🎯 Objetivo del Proyecto
Diseñar, modelar e implementar una base de datos relacional para la gestión de inspecciones, certificaciones y recursos humanos de una empresa multinacional de servicios de calidad, además de construir un pequeño sistema web que permita interactuar con dicha base de datos.

---

## 🧱 Tecnologías Utilizadas
| Capa | Tecnología |
|------|------------|
| Base de datos | Microsoft SQL Server 2019 |
| Modelado | Herramientas CASE (SSMS, Draw.io) |
| Back-end | Procedimientos almacenados, funciones escalares y tabla, triggers |
| Front-end | HTML5 + CSS3 + JavaScript (interfaz mínima) |
| Utilidades | SSIS (exportación a Excel), SQL Server Agent (backups) |

---

## 🗺️ Diagramas & Modelos

Para poder visualizar de mejor manera los diagramas


## 🧱 Modelo Lógico (ER)

```mermaid
erDiagram
    PAIS {
        TINYINT idPais PK
        VARCHAR(40) nombrePais
        VARCHAR(400) descripcionTrab
        VARCHAR(50) nombreGerente
        DECIMAL(20,4) ganancias
        INT nroEmpleados
    }

    AREAS {
        TINYINT idArea PK
        VARCHAR(11) nombreArea
        VARCHAR(400) descripcion
        INT nroEmpleados
        VARCHAR(50) nombreJefe
        VARCHAR(100) direccionGerencia
    }

    SEDE {
        SMALLINT idSede PK
        VARCHAR(100) direccion
        VARCHAR(30) distrito
        VARCHAR(40) ciudad
        INT codigoPostal
        VARCHAR(13) telefono
        TINYINT idPais FK
        TINYINT idArea FK
    }

    PUESTO {
        TINYINT idPuesto PK
        VARCHAR(30) nombrePuesto
        DECIMAL(5,2) sueldo
    }

    SEGUROMEDICO {
        INT idSeguro PK
        VARCHAR(20) tipoSeguro
        DECIMAL(4,2) monto
        DATE fechaPago
    }

    EMPLEADO {
        INT idEmpleado PK
        VARCHAR(40) nombresEmpleado
        VARCHAR(40) apellidosEmpleado
        VARCHAR(70) correoElectronico
        VARCHAR(255) contrasena
        VARCHAR(30) titulo
        DATE fechaIngreso
        VARCHAR(100) direccion
        VARCHAR(13) telefono
        DATE vencimientoContrato
        TINYINT idPuesto FK
        INT idSeguro FK
        TINYINT idArea FK
        SMALLINT idSede FK
    }

    DESCANSOMEDICO {
        INT idDescanso PK
        VARCHAR(400) descripcion
        DATE fechaSolicitud
        DATE fechaSalida
        DATE fechaRetorno
        INT idEmpleado FK
    }

    GESTIONVACACIONES {
        INT idVacaciones PK
        TINYINT cantidadDias
        DATE fechaInicio
        DATE fechaRetorno
        BIT confirmado
        INT idEmpleado FK
    }

    TIPOCERTIFICADO {
        SMALLINT idTipoCert PK
        VARCHAR(20) nombreCert
        VARCHAR(400) descripcionCert
    }

    EMPRESACLIENTE {
        INT idEmpresaCliente PK
        VARCHAR(12) RUC
        VARCHAR(50) nombreEmpresaCliente
        VARCHAR(100) direccionEmpresa
        VARCHAR(50) nombreGerente
        VARCHAR(16) telefonoEmpresaCliente
        VARCHAR(100) correoEmpresaCliente
    }

    EMPRESAPROVEEDORA {
        INT idEmpresaProveedora PK
        VARCHAR(12) RUC
        VARCHAR(50) nombreEmpresaProveedora
        VARCHAR(100) direccionEmpresa
        VARCHAR(50) nombreGerente
        VARCHAR(30) rubro
        VARCHAR(16) telefonoEmpresaProveedora
        VARCHAR(100) correoEmpresaProveedora
    }

    TIPOINSPECCION {
        TINYINT idTipoInspeccion PK
        VARCHAR(30) nombreInspeccion
        VARCHAR(400) descripcion
    }

    TIPOANALISIS {
        TINYINT idTipoAnalisis PK
        VARCHAR(30) nombreAnalisis
        VARCHAR(400) descripcionAnalisis
    }

    ORDENINSPECCION {
        INT idOrden PK
        DATE fechaEmision
        DATE fechaDeInspeccion
        VARCHAR(30) nombreInspector
        VARCHAR(400) descripcion
        INT idEmpresaProveedora FK
        TINYINT idTipoInspeccion FK
        INT idEmpleado FK
    }

    ACTA {
        INT idActa PK
        DATE fechaEmision
        VARCHAR(400) descripcion
        INT idEmpresaProveedora FK
        INT idEmpleado FK
        INT idOrdenInspeccion FK
        TINYINT idTipoInspeccion FK
        TINYINT idTipoAnalisis FK
    }

    CERTIFICACION {
        INT idCertificacion PK
        DATE fechaCertificacion
        SMALLINT idTipoCertificado FK
        INT idEmpresaCliente FK
        INT idEmpresaProveedora FK
        INT idActa FK
    }

    %% ---- Relaciones ----
    SEDE ||--o{ EMPLEADO : "1-N"
    PUESTO ||--o{ EMPLEADO : "1-N"
    SEGUROMEDICO ||--o{ EMPLEADO : "1-N"
    AREAS ||--o{ EMPLEADO : "1-N"
    AREAS ||--o{ SEDE : "1-N"
    PAIS ||--o{ SEDE : "1-N"
    EMPLEADO ||--o{ DESCANSOMEDICO : "1-N"
    EMPLEADO ||--o{ GESTIONVACACIONES : "1-N"
    EMPRESAPROVEEDORA ||--o{ ORDENINSPECCION : "1-N"
    TIPOINSPECCION ||--o{ ORDENINSPECCION : "1-N"
    EMPLEADO ||--o{ ORDENINSPECCION : "1-N"
    ORDENINSPECCION ||--o{ ACTA : "1-1"
    TIPOINSPECCION ||--o{ ACTA : "1-N"
    TIPOANALISIS ||--o{ ACTA : "1-N"
    EMPRESAPROVEEDORA ||--o{ ACTA : "1-N"
    EMPLEADO ||--o{ ACTA : "1-N"
    TIPOCERTIFICADO ||--o{ CERTIFICACION : "1-N"
    EMPRESACLIENTE ||--o{ CERTIFICACION : "1-N"
    EMPRESAPROVEEDORA ||--o{ CERTIFICACION : "1-N"
    ACTA ||--o{ CERTIFICACION : "1-1"
```

---

## 🧮 Procedimientos & Funciones Destacados

| Objeto | Tipo | Propósito |
|--------|------|-----------|
| `usp_llenar_acta` | PA | Crear acta a partir de una orden de inspección |
| `usp_llenar_certificado` | PA | Emitir certificado ligado a acta y cliente |
| `usp_actualizar_empleado` | PA | Actualizar datos de empleado y mantener consistencia de contadores por país/área |
| `fne_SueldoNeto` | Escalar | Calcular sueldo final (descuentos AFP, seguro) |
| `fnt_empleados_descanso` | Tabla | Listar empleados actualmente con descanso médico |

&gt; Todos los objetos están versionados en `/sql/store/` con prefijo `usp_` (procedimientos) y `fn_` (funciones).

---

## 🔄 Triggers de Auditoría

| Trigger | Tabla | Evento | Acción |
|---------|--------|--------|--------|
| `tr_empleadoInsertado` | rrhh.Empleado | INSERT | Registro en `historial_empleado` |
| `tr_empleadoModificado` | rrhh.Empleado | UPDATE | Idem + fecha/hora |
| `tr_empleadoEliminado` | rrhh.Empleado | DELETE | Idem + usuario |

---

## 💾 Backups Automáticos
- **Frecuencia:** Diaria 00:00 hrs  
- **Destinos:** Disco local `D:\backups\` + carpeta secundaria `C:\respaldo\`  
- **Técnica:** Job SQL Server Agent con formato `.bak` y timestamp.  
*Configuración:* `docs/fig92_job_backup.png`

---

## 📊 Exportación a Excel
Flujo SSIS que replica la tabla `cmcl.Certificacion` a archivo `.xlsx` para reportes gerenciales.  
*Origen:* OLE DB SQL Server  
*Destino:* Excel 2016+ (xlsx)  
*Vista:* `docs/fig94_95_ssis.png`

---

## 🧪 Calendario de Tareas
```mermaid
gantt
  title Cronograma resumido (2022)
  dateFormat YYYY-MM-DD
  section Modelado
  Entrevistas           :2022-05-15, 3d
  MER & lógico          :2022-05-26, 5d
  section Implementación
  Esquemas y tablas     :2022-06-01, 4d
  Procedimientos        :2022-07-01, 8d
  Triggers & backups    :2022-07-23, 3d
  section Frontend
  Interfaz web          :2022-07-18, 6d
