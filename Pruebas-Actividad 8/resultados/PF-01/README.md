# PF-01 – Envío exitoso del formulario

## Tipo de prueba
Prueba funcional.

## Objetivo
Comprobar que el usuario pueda diligenciar y enviar el formulario de contacto con datos válidos y que el sistema muestre la confirmación esperada.

## Precondiciones
- El servidor web y PHP están disponibles.
- El formulario de contacto está accesible.
- Se utiliza el ambiente de pruebas definido para el proyecto.

## Datos de entrada
- **Nombre:** Camilo Zamora
- **Email:** camilo@hotmail.com
- **Asunto:** Test
- **Mensaje:** Esto es un test.

## Pasos de ejecución
1. Abrir el formulario de contacto.
2. Completar todos los campos con los datos de entrada.
3. Pulsar **Enviar mensaje**.
4. Verificar la respuesta que presenta el sistema.
5. Guardar una captura de pantalla en esta carpeta.

## Resultado esperado
El sistema acepta los datos válidos y muestra una confirmación de recepción.

## Resultado obtenido
La prueba se ejecutó correctamente. El formulario permitió enviar los datos y mostró la respuesta esperada.

## Estado
APROVADO

## Evidencias
- `PF-01-formulario.png`
- `PF-01-confirmacion.png`
