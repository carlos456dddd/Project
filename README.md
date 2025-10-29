# 📁 Proyecto 
**Escuela Profesional de Ingeniería de Sistemas e Informática**  
**Tipo:** Proyecto grupal académico  
---

## 🎯 Objetivo del Proyecto

Diseñar, modelar e implementar una base de datos relacional para la gestión de inspecciones, certificaciones y recursos humanos de una empresa multinacional de servicios de calidad, además de construir un pequeño sistema web que permita interactuar con dicha base de datos. 
Representando los conocimientos adquieridos en base de datos.

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

## 📊 Diagrama de Casos de Uso del Negocio
En caso de querer visualizar de mejor manera los diagramas que se planteo puede acceder a la sección demominada 'Documentation' en este mismo repositorio.
[📄 Archivo PDF con los casos de uso](Documentation/DiagramasCasoDeUsoUML-12-14-uml.pdf)

```mermaid
%%{init: {'theme':'neutral'}}%%
graph TD
  Cliente((Empresa Cliente))
  Comercial((Área Comercial))
  Proveedor((Empresa Proveedora))
  Inspector((Inspector))
  Lab((Personal Laboratorio))

  %% Proceso general
  Cliente -->|UC001: Contactar| Comercial
  Comercial -->|UC002: Generar orden| UC003[UC003: Informar orden]
  UC003 --> Proveedor

  %% Inspección higiénico-sanitaria
  Proveedor -->|UC004: Revisar instalaciones| Inspector
  Inspector -->|UC005: Obtener datos empleados| Proveedor

  %% Muestreo
  Inspector -->|UC006: Tomar muestras superficies| Proveedor
  Inspector -->|UC007: Tomar muestras personal| Proveedor
  Inspector -->|UC008: Tomar muestras producto final| Proveedor
  Inspector -->|UC009: Enviar a laboratorio| Lab

  %% Análisis
  Lab -->|UC010: Realizar análisis| Lab

  %% Certificación
  Lab -->|UC011: Comprobar resultados| Comercial
  Comercial -->|UC012: Generar certificado| Cliente
```
## 🧱 Modelo Lógico (ER)
Para mas detalles acceda al apartado en 'Documentation' donde se podrá visualizar tanto el Modelo lógico, conceptual y modelo físico de la base de datos.
[📄 Archivo PDF Modelos de la base de datos](Documentation/ModeloConceptual-ModeloLógico-ModeloFísico-BasedeDatos.pdf)
```mermaid
erDiagram
    PAIS {
        int idPais PK
        string nombrePais
        string descripcionTrab
        string nombreGerente
        decimal ganancias
        int nroEmpleados
    }

    AREAS {
        int idArea PK
        string nombreArea
        string descripcion
        int nroEmpleados
        string nombreJefe
        string direccionGerencia
    }

    SEDE {
        int idSede PK
        string direccion
        string distrito
        string ciudad
        int codigoPostal
        string telefono
        int idPais FK
        int idArea FK
    }

    PUESTO {
        int idPuesto PK
        string nombrePuesto
        decimal sueldo
    }

    SEGUROMEDICO {
        int idSeguro PK
        string tipoSeguro
        decimal monto
        date fechaPago
    }

    EMPLEADO {
        int idEmpleado PK
        string nombresEmpleado
        string apellidosEmpleado
        string correoElectronico
        string contrasena
        string titulo
        date fechaIngreso
        string direccion
        string telefono
        date vencimientoContrato
        int idPuesto FK
        int idSeguro FK
        int idArea FK
        int idSede FK
    }

    DESCANSOMEDICO {
        int idDescanso PK
        string descripcion
        date fechaSolicitud
        date fechaSalida
        date fechaRetorno
        int idEmpleado FK
    }

    GESTIONVACACIONES {
        int idVacaciones PK
        int cantidadDias
        date fechaInicio
        date fechaRetorno
        boolean confirmado
        int idEmpleado FK
    }

    TIPOCERTIFICADO {
        int idTipoCert PK
        string nombreCert
        string descripcionCert
    }

    EMPRESACLIENTE {
        int idEmpresaCliente PK
        string RUC
        string nombreEmpresaCliente
        string direccionEmpresa
        string nombreGerente
        string telefonoEmpresaCliente
        string correoEmpresaCliente
    }

    EMPRESAPROVEEDORA {
        int idEmpresaProveedora PK
        string RUC
        string nombreEmpresaProveedora
        string direccionEmpresa
        string nombreGerente
        string rubro
        string telefonoEmpresaProveedora
        string correoEmpresaProveedora
    }

    TIPOINSPECCION {
        int idTipoInspeccion PK
        string nombreInspeccion
        string descripcion
    }

    TIPOANALISIS {
        int idTipoAnalisis PK
        string nombreAnalisis
        string descripcionAnalisis
    }

    ORDENINSPECCION {
        int idOrden PK
        date fechaEmision
        date fechaDeInspeccion
        string nombreInspector
        string descripcion
        int idEmpresaProveedora FK
        int idTipoInspeccion FK
        int idEmpleado FK
    }

    ACTA {
        int idActa PK
        date fechaEmision
        string descripcion
        int idEmpresaProveedora FK
        int idEmpleado FK
        int idOrdenInspeccion FK
        int idTipoInspeccion FK
        int idTipoAnalisis FK
    }

    CERTIFICACION {
        int idCertificacion PK
        date fechaCertificacion
        int idTipoCertificado FK
        int idEmpresaCliente FK
        int idEmpresaProveedora FK
        int idActa FK
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

Para visualización con mas detalle:
[📄 Archivo PDF Procedimientos y funciones utilizados](Documentation/Procedimientos-y-funciones.pdf)

---

## 🔄 Triggers de Auditoría

| Trigger | Tabla | Evento | Acción |
|---------|--------|--------|--------|
| `tr_empleadoInsertado` | rrhh.Empleado | INSERT | Registro en `historial_empleado` |
| `tr_empleadoModificado` | rrhh.Empleado | UPDATE | Idem + fecha/hora |
| `tr_empleadoEliminado` | rrhh.Empleado | DELETE | Idem + usuario |

Para visualización con mas detalle:
[📄 Archivo PDF Triggers de Auditoría](Documentation/Triggers.pdf)

---

## 💾 Backups Automáticos
- **Frecuencia:** Diaria 00:00 hrs  
- **Destinos:** Disco local `D:\backups\` + carpeta secundaria `C:\respaldo\`  
- **Técnica:** Job SQL Server Agent con formato `.bak` y timestamp.  
Para visualización con mas detalle:
[📄 Archivo PDF Backups](Documentation/CreaciónBackup.pdf)
---

## 📊 Exportación a Excel
Flujo SSIS que replica la tabla `cmcl.Certificacion` a archivo `.xlsx` para reportes gerenciales.  
*Origen:* OLE DB SQL Server  
*Destino:* Excel 2016+ (xlsx)  
Para visualización con mas detalle:
[📄 Archivo PDF Transferencia de certificaciones a Excel](Documentation/Transferencia-de-tabla-certificaciones-a-Excel.pdf)

---

## 🧪 Calendario de Tareas
```mermaid
gantt
  title Cronograma resumido (2024)
  dateFormat YYYY-MM-DD
  section Modelado
  Entrevistas           :2024-05-15, 3d
  MER & lógico          :2024-05-26, 5d
  section Implementación
  Esquemas y tablas     :2024-06-01, 4d
  Procedimientos        :2024-07-01, 8d
  Triggers & backups    :2024-07-23, 3d
  section Frontend
  Interfaz web          :2024-07-18, 6d
```
## Consideraciones Finales
En caso de querer utilizar la base de datos puede restaurar la base de datos puede ingresar directamente a la carpeta 'Backup' del respositorio para poder realizarlo con Microsoft SQL Server 2019. El archivo esta disponible como [Backup](Backup)
