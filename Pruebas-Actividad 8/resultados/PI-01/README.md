# PI-01 – Integración entre HTML y PHP

## Tipo de prueba
Prueba de integración.

## Objetivo
Verificar que el formulario envíe los datos mediante HTTP POST a `procesar.php` y que el servidor genere la respuesta esperada.

## Precondiciones
- El servidor web y PHP están disponibles.
- El formulario de contacto está abierto.
- Las herramientas de desarrollador de Google Chrome están disponibles.

## Datos de entrada
- **Nombre:** Camilo Zamora
- **Email:** camilo@hotmail.com
- **Asunto:** Test PI-01
- **Mensaje:** Esto es un test para PI-01.

## Pasos de ejecución
1. Abrir el formulario de contacto.
2. Abrir las herramientas de desarrollador con `F12` o `Ctrl + Shift + I`.
3. Seleccionar la pestaña **Network** y activar **Preserve log**.
4. Completar todos los campos con los datos de entrada.
5. Pulsar **Enviar mensaje**.
6. En Network, seleccionar la petición `procesar.php`.
7. Verificar en **Headers** que el método sea `POST`.
8. Verificar en **Payload** que aparezcan los campos enviados.
9. Revisar **Response** y confirmar que contiene la respuesta esperada del servidor.
10. Guardar capturas de pantalla en esta carpeta.

## Resultado esperado
La petición POST llega a `procesar.php`, contiene los datos del formulario y el servidor devuelve la respuesta esperada.

## Resultado obtenido
La prueba se ejecutó correctamente. En Chrome DevTools se verificó el envío mediante POST, la presencia de los datos y la respuesta generada por PHP.

## Estado
APROVADO

## Evidencias
- `PI-01-network-post.png`
- `PI-01-payload.png`
- `PI-01-formaulario.png`
