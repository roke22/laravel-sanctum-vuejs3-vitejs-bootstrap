# Laravel 9 + Sanctum + Vuejs 3 + TS + Vite + Bootstrap 5
<p align="center">
<img
  src="/screen-login.png"
  width="500">
</p>
<p align="center">
<img
  src="/screen-dashboard.png"
  width="500">
</p>
<p align="center">
<img
  src="/screen-datatable.png"
  width="500">
</p>

## How to install?
    1. Clone the project
    2. In root folder run "composer install"
    3. In "public-dev" folder run "npm install"
    4. In "public-dev" folder run "npm run build" to copy all files so backend request works,  
        that request goes to laravel and not to vite server. Very important for 404 errors on  
        backend request.
    5. In "public-dev" folder run "npm run dev" to start develpment server or 
       "npm run build" to build the frontend in "public" folder

## Structure 

    1. Backend: It is laravel structure but without views, in resource we only have the  
        email template for "forgot-password"
    2. Front-end: It is in the "public-dev" folder, the structure is:
        - public: All static files that will be copy on the "npm run build"
        - Src: Vuejs 3 app directory with:
            - assets -> assets
            - components -> all vuejs components for the app
            - css -> css files
            - js -> js files 
            - plugins -> api endpoints and routes
            - store -> store definition using pinia

## Views

    - Login
    - Logout
    - Forgot password, this send an email with link for reset the password
    - Reset Password with UUID
    - Dashboard with datatable example

## Theme
    Volt theme -> https://demo.themesberg.com/volt/

## What packages have been used?
## Backend
### Laravel 9 https://laravel.com/
    PHP Framework that made easy the development
### Laravel Sanctum https://laravel.com/docs/9.x/sanctum

    Laravel Sanctum provides a featherweight authentication system for SPAs 
    (single page applications), mobile applications, and simple, token based APIs
    
## Frontend

## Libraries
    - linmasahiro/vue3-table-lite -> https://github.com/linmasahiro/vue3-table-lite
    - Fontawesome -> https://fontawesome.com/
    - notyf -> https://github.com/caroso1222/notyf
    - axios -> https://axios-http.com/
    - and more, you can see on the package.json file

### Vite https://vitejs.dev/
    Development environment that allows us to see the changes we make in the frontend in real time,
    among many other things.

### Vuejs 3 https://vuejs.org/
    Vuejs 3 Javascript Framework

## What have we done to make it work?

### Backend
    1. Install laravel 9 and laravel sanctum
    
    2. We configure sanctum as indicated in https://laravel.com/docs/9.x/sanctum#spa-authentication
    
    3. Instead of modifying the sanctum config file, we add the SANCTUM_STATEFUL_DOMAINS variable to
       the env to have greater visibility
    
    4. We modify in the env 
            SESSION_DRIVER=cookie
            SESSION_DOMAIN=.domain.com
            SANCTUM_STATEFUL_DOMAINS=your.domain.com:8000,your.domain.com

       In SANCTUM_STATEFUL_DOMAINS we put both because Vitejs use the port 8000 for frontend 
       development so we ensure that both are trusted

    5. We configure the file to be able to send emails, the "forgot-password" view
       send an email with the link

### Frontend
    1. Install vitejs with the command:
        npm create vite@latest public-dev --template vue

    2. Install vue-router with the command "npm install vue-router@4 --save"
       Ahora importamos vue-router en el fichero "public-dev/src/main.ts"

    3. We install fontawesome with the commands:
        npm i --save @fortawesome/fontawesome-svg-core
        npm i --save @fortawesome/free-solid-svg-icons
        npm i --save @fortawesome/free-regular-svg-icons\n
        npm i --save @fortawesome/free-brands-svg-icons
        npm i --save @fortawesome/vue-fontawesome@latest-3

       Now we import fontawesome in the file "public-dev/src/main.ts"
    
    4. Install axios for api requests with the command "npm install axios --save"
    
        We import axios by creating the file "public-dev/src/plugins/api.ts" which we then 
        import into "/public-dev/src/main.ts"

    5. We include bootstrap 5, install with command "npm install bootstrap" and import the 
       bootstrap css and js into "/public-dev/src/main.ts"

    6. To avoid csrf token errors and unwritable cookies we are going to configure the vitejs 
       development environment to use the same domain as the backend.

       For this we will modify the file "public-dev/vite.config.ts", all the modifications 
       have been commented to understand them

# SPANISH

# Laravel 9 + Sanctum + Vuejs 3 + TS + Vite + Bootstrap 5

## ??Como lo instalo?
    1. Clona el proyecto
    2. En el directorio raiz ejecuta "composer install"
    3. En la carpeta "public-dev" ejecuta "npm install"
    4. En la carpeta "public-dev" ejecuta "npm run build" para copiar los ficheros,  
        las peticiones al backend van por laravel y no funcionaran. Muy importante 
        para los errores 404 de peticiones que se hagan al backend.
    5. En la carpeta "public-dev" ejecuta "npm run dev" para levantar el servidor 
       de desarrollo o "npm run build" para hacer el build en la carpeta raiz "public" 

## Estructura 

    1. Backend: Es un laravel pero sin vistas, en "resource" solo tenemos el email  
        que se usa para la funcionalidad de olvide mi contrase??a  
    2. Front-end: Esta en la carpeta "public-dev", la estructura es:
        - public: Todos los ficheros estaticos que se copiaran con el comando "npm run build"
        - Src: Directorio de la app Vuejs 3 con:
            - assets -> assets
            - components -> Todos los componentes Vuejs para la app
            - css -> Ficheros css
            - js -> Ficheros js
            - plugins -> Endpoints del api y las rutas usadas
            - store -> Definicion del store utilizando pinia
            
## Vistas
    - Login
    - Logout
    - Forgot password, esta vista envia un correo electronico con el link
    - Reset Password con UUID
    - Dashboard con un ejemplo de datatable

## Tema
    Volt theme -> https://demo.themesberg.com/volt/

## ?? Que paquetes se han utilizado ?
## Backend
### Laravel 9 https://laravel.com/
    PHP Framework que nos facilitara el desarrollo de nuestro backend
### Laravel Sanctum https://laravel.com/docs/9.x/sanctum

    Paquete que gestiona los tokens, sesi??n basada en cookie y CSRF que nos ayudara a 
    gestionar la autenticaci??n
    
## Frontend

## Librerias
    - linmasahiro/vue3-table-lite -> https://github.com/linmasahiro/vue3-table-lite
    - Fontawesome -> https://fontawesome.com/
    - notyf -> https://github.com/caroso1222/notyf
    - axios -> https://axios-http.com/
    - y mas, puedes verlas en el fichero package.json

### Vite https://vitejs.dev/
    Entorno de desarrollo que nos permite ver los cambios que hacemos en el frontend en 
    tiempo real entre otras muchas cosas.

### Vuejs 3 https://vuejs.org/
    Vuejs 3 Javascript Framework

## ??Que hemos hecho para hacerlo funcionar?

### Backend
    1. Instalar laravel 9 y laravel sanctum
    
    2. Configuramos sanctum tal y como indican en 
       https://laravel.com/docs/9.x/sanctum#spa-authentication 
    
    3. En lugar de modificar el fichero config de sanctum a??adimos en el env la variable 
       SANCTUM_STATEFUL_DOMAINS para tener mayor visibilidad
    
    4. Modificamos en el env 
            SESSION_DRIVER=cookie
            SESSION_DOMAIN=.domain.com
            SANCTUM_STATEFUL_DOMAINS=your.domain.com:8000,your.domain.com

       En SANCTUM_STATEFUL_DOMAINS ponemos ambos porque Vitejs use el puerto 8000 para el 
       desarrollo del frontend asi nos aseguramos que funcionan

    5. Configuramos el fichero para poder enviar correos ya que la vista de "forgot-password"
       envia un correo electronico con el enlace

### Frontend
    1. Instalamos vitejs con el comando: 
        npm create vite@latest public-dev --template vue

    2. Instalamos vue-router con el comando "npm install vue-router@4 --save"
       Ahora importamos vue-router en el fichero "public-dev/src/main.ts"

    3. Instalamos fontawesome con los comandos:
        npm i --save @fortawesome/fontawesome-svg-core
        npm i --save @fortawesome/free-solid-svg-icons
        npm i --save @fortawesome/free-regular-svg-icons\n
        npm i --save @fortawesome/free-brands-svg-icons
        npm i --save @fortawesome/vue-fontawesome@latest-3

       Ahora importamos fontawesome en el fichero "public-dev/src/main.ts"
    
    4. Instalar axios para las peticiones a la api con el comando 
        "npm install axios --save"
    
        Importamos axios creando el fichero "public-dev/src/plugins/api.ts" que luego 
        importamos en "/public-dev/src/main.ts"

    5. Instalamos bootstrap 5 con el comando "npm install bootstrap" e importamos
       el css y js en el fichero "/public-dev/src/main.ts"

    6. Para evitar errores de csrf token y cookies que no pueden escribirse vamos a configurar 
       el entorno de desarrollo de vitejs para usar el mismo dominio que el backend.

       Para ello modificaremos el fichero "public-dev/vite.config.ts", todas las modificaciones
       han sido comentadas para comprenderlas