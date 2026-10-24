# PV-01 – Campo obligatorio vacío

## Tipo de prueba
Prueba de validación.

## Objetivo
Comprobar que el formulario impida el envío cuando un campo obligatorio no contiene información.

## Precondiciones
- El servidor web está disponible.
- El formulario de contacto está abierto.
- Se utiliza el ambiente de pruebas definido para el proyecto.

## Datos de entrada
- **Nombre:** Camilo Zamora
- **Email:** camilo@hotmail.com
- **Asunto:** Test PV-01
- **Mensaje:** [vacío].

## Pasos de ejecución
1. Abrir el formulario de contacto.
2. Completar el nombre, el correo y el mensaje.
3. Dejar vacío el campo **Asunto**.
4. Pulsar **Enviar mensaje**.
5. Verificar que se impida el envío y que aparezca la validación correspondiente.
6. Guardar una captura de pantalla en esta carpeta.

## Resultado esperado
El formulario bloquea el envío porque falta un dato obligatorio.

## Resultado obtenido
La prueba se ejecutó correctamente. El formulario impidió el envío cuando el campo obligatorio quedó vacío.

## Estado
APROVADO

## Evidencias
- `PV-01-campo-obligatorio.png`
- `PV-01-formulario.png`
