# Gestión de Proyectos TechSolutions

Sistema web integral para la gestión eficiente de proyectos empresariales. Esta aplicación permite crear, visualizar, actualizar y eliminar proyectos de forma intuitiva y segura.

## 📋 Descripción del Proyecto

**Gestión de Proyectos TechSolutions** es una aplicación web desarrollada con **Laravel 12** que proporciona una solución completa para administrar proyectos empresariales. El sistema mantiene un registro centralizado de todos los proyectos con información detallada sobre cronograma, estado, responsables y presupuesto.

## 🚀 Características Principales

- **Listado de Proyectos**: Visualización completa de todos los proyectos con información resumida
- **Crear Proyectos**: Formulario intuitivo para registrar nuevos proyectos
- **Detalles del Proyecto**: Vista detallada con toda la información del proyecto
- **Editar Proyectos**: Actualizar información de proyectos existentes
- **Eliminar Proyectos**: Remover proyectos con confirmación de seguridad
- **Gestión de Estados**: Proyectos pueden estar en estado Planificado, En progreso, Finalizado o Cancelado
- **Interfaz Responsive**: Diseño moderno y adaptable a todos los dispositivos
- **Persistencia en Sesión**: Almacenamiento de datos durante la sesión del usuario

## 🛠️ Stack Tecnológico

### Backend
- **Laravel**: Framework PHP versión 12.0+
- **PHP**: Versión 8.2+
- **SQLite**: Base de datos ligera

### Frontend
- **Blade Templates**: Motor de plantillas de Laravel
- **Tailwind CSS**: Framework CSS versión 4.0 para estilos modernos
- **Vite**: Bundler y servidor de desarrollo

### Herramientas de Desarrollo
- **Composer**: Gestor de dependencias PHP
- **NPM**: Gestor de paquetes Node.js
- **Concurrently**: Ejecución de múltiples procesos simultáneos

## 📊 Estructura de Datos

### Modelo Proyecto

Cada proyecto contiene los siguientes campos:

| Campo | Tipo | Descripción |
|-------|------|-------------|
| `id` | Entero | Identificador único del proyecto |
| `nombre` | Texto | Nombre descriptivo del proyecto |
| `fechaInicio` | Fecha | Fecha de inicio del proyecto (YYYY-MM-DD) |
| `estado` | Texto | Estado actual: Planificado, En progreso, Finalizado, Cancelado |
| `responsable` | Texto | Nombre de la persona responsable |
| `monto` | Decimal | Presupuesto del proyecto en pesos chilenos |

### Proyectos de Ejemplo

La aplicación incluye 4 proyectos de iniciales:

1. **Portal Corporativo** - En progreso - $15,000,000 CLP
2. **Migración a la Nube** - Planificado - $28,500,000 CLP
3. **App Móvil de Ventas** - Finalizado - $9,800,000 CLP
4. **Rediseño Intranet** - En progreso - $12,300,000 CLP

## 📁 Estructura del Proyecto

```
gestion-proyectos-techsolutions/
├── app/
│   ├── Http/Controllers/          # Controladores de la aplicación
│   │   ├── ListarProyectosController.php
│   │   ├── CrearProyectoController.php
│   │   ├── ActualizarProyectoController.php
│   │   ├── EliminarProyectoController.php
│   │   └── DetalleProyectoController.php
│   ├── Models/
│   │   ├── Proyecto.php           # Modelo de datos de proyectos
│   │   └── User.php               # Modelo de usuario
│   ├── Providers/
│   │   └── AppServiceProvider.php # Proveedor de servicios de la app
│   ├── Services/
│   │   ├── ProyectoService.php    # Lógica de negocio de proyectos
│   │   └── IndicadorEconomicoService.php # Servicio de indicadores económicos (UF)
│   └── View/Components/
│       └── ValorUfDelDia.php      # Componente Blade para la UF del día
├── resources/
│   ├── views/
│   │   ├── layouts/
│   │   │   └── plantilla-principal.blade.php
│   │   ├── proyectos/             # Vistas específicas
│   │   │   ├── listar-proyectos.blade.php
│   │   │   ├── crear-proyecto.blade.php
│   │   │   ├── editar-proyecto.blade.php
│   │   │   ├── eliminar-proyecto.blade.php
│   │   │   └── detalle-proyecto.blade.php
│   │   ├── components/
│   │   │   └── valor-uf-del-dia.blade.php
│   │   └── welcome.blade.php
│   ├── css/
│   │   └── app.css                # Estilos CSS
│   └── js/
│       └── app.js                 # Scripts JavaScript
├── routes/
│   └── web.php                    # Definición de rutas HTTP
├── database/
│   ├── database.sqlite            # Base de datos SQLite
│   └── migrations/                # Migraciones de BD
├── config/                        # Archivos de configuración
├── composer.json                  # Dependencias PHP
├── package.json                   # Dependencias Node.js
└── vite.config.js                 # Configuración de Vite
```

## 🔗 Rutas de la Aplicación

| Método | Ruta | Controlador | Descripción |
|--------|------|-------------|-------------|
| GET | `/proyectos` | ListarProyectosController | Listar todos los proyectos |
| GET | `/proyectos/crear` | CrearProyectoController@mostrarFormulario | Mostrar formulario de creación |
| POST | `/proyectos/crear` | CrearProyectoController@guardar | Guardar nuevo proyecto |
| GET | `/proyectos/{id}` | DetalleProyectoController | Ver detalles de un proyecto |
| GET | `/proyectos/{id}/editar` | ActualizarProyectoController@mostrarFormulario | Mostrar formulario de edición |
| PUT | `/proyectos/{id}` | ActualizarProyectoController@actualizar | Actualizar proyecto |
| GET | `/proyectos/{id}/eliminar` | EliminarProyectoController@mostrarConfirmacion | Confirmar eliminación |
| DELETE | `/proyectos/{id}` | EliminarProyectoController@destruir | Eliminar proyecto |

## ⚙️ Instalación y Configuración

### Requisitos Previos

- **PHP 8.2+**
- **Composer**
- **Node.js 18+** y NPM
- **Git**

### Pasos de Instalación

1. **Clonar o descargar el repositorio**
   ```bash
   git clone https://github.com/aorvaez/desarrollo_sw_eva1.git
   cd gestion-proyectos-techsolutions
   ```

2. **Instalar dependencias PHP**
   ```bash
   composer install
   ```

3. **Ejecutar instalación completa**
   ```bash
   composer run setup
   ```

   Este comando ejecutará automáticamente:
   - Instalación de dependencias Composer
   - Creación del archivo `.env`
   - Generación de clave de aplicación
   - Migraciones de base de datos
   - Instalación de dependencias NPM
   - Compilación de assets frontend

4. **Iniciar servidor de desarrollo** (alternativa manual)
   ```bash
   composer run dev
   ```

   Este comando iniciará:
   - Servidor PHP en `http://localhost:8000`
   - Queue listener para trabajos en background
   - Logs en tiempo real
   - Servidor Vite para assets

## 🏗️ Arquitectura de la Aplicación

### Patrón MVC

La aplicación sigue el patrón Model-View-Controller:

- **Models** (`app/Models/`): Definen la estructura de datos (Proyecto.php)
- **Controllers** (`app/Http/Controllers/`): Manejan la lógica de negocio y solicitudes HTTP
- **Views** (`resources/views/`): Plantillas Blade para la interfaz de usuario

### Service Layer

- **ProyectoService.php**: Encapsula la lógica de negocio relacionada con proyectos
- **IndicadorEconomicoService.php**: Servicio para indicadores económicos (UF del día)

## 🎨 Estilos y Diseño

La interfaz utiliza **Tailwind CSS 4.0** para un diseño moderno y responsive:

- Componentes reutilizables mediante Blade components
- Estilos consistentes en toda la aplicación
- Diseño mobile-first
- Tema claro y accesible

### Componentes Principales

- `valor-uf-del-dia.blade.php`: Muestra el valor de la UF (Unidad de Fomento) del día

## 🧪 Testing

Ejecutar pruebas unitarias:
```bash
composer run test
```

Archivos de prueba:
- `tests/Unit/`: Pruebas unitarias
- `tests/Feature/`: Pruebas funcionales

## 📝 Configuración del Ambiente

El archivo `.env.example` contiene todas las variables de configuración necesarias:

```env
APP_NAME=Laravel
APP_ENV=local
APP_DEBUG=true
APP_URL=http://localhost

DB_CONNECTION=sqlite
SESSION_DRIVER=database
CACHE_STORE=database
```

**Importante**: Copiar `.env.example` a `.env` y configurar según sea necesario.

## 🔐 Seguridad

- Protección contra CSRF mediante tokens
- Validación de entrada en formularios
- Almacenamiento seguro de sesiones en base de datos
- Uso de prepared statements para prevenir inyección SQL

## 📦 Dependencias Principales

### PHP (Composer)
- `laravel/framework`: ^12.0
- `laravel/tinker`: ^2.10.1
- `guzzlehttp/guzzle`: ^7.15

### JavaScript (NPM)
- `tailwindcss`: ^4.0.0
- `laravel-vite-plugin`: ^2.0.0
- `axios`: ^1.11.0
- `concurrently`: ^9.0.1

## 👥 Autor

**Claudio Ramírez - Andres Orellana**
- Estudiantes de Desarrollo Web I
- Sección: 50
- Profesor: Victor Cofre Farias
- IPSS - Instituto de Formación Profesional



## 📚 Referencias Útiles

- [Documentación de Laravel](https://laravel.com/docs)
- [Documentación de Tailwind CSS](https://tailwindcss.com/docs)
- [Documentación de Vite](https://vitejs.dev/guide/)
- [Blade Templates](https://laravel.com/docs/blade)

---

**Última actualización**: Agosto 2026
