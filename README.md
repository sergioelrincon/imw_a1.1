# saluda.php

La aplicación PHP que implementé tiene como objetivo mostrar un saludo y una imagen en función de la hora del día. Su funcionamiento se basa en lo siguiente:

1. **Detección de la hora**: El script obtiene la hora actual del servidor utilizando la función `date("H")`, que devuelve la hora en formato de 24 horas. En función de esta hora, se determina si es por la mañana (entre las 6 y las 12), por la tarde (entre las 12 y las 18) o por la noche (entre las 18 y las 6 del día siguiente).

2. **Selección del mensaje y momento del día**: Dependiendo de la hora, se define un mensaje de saludo. Si es por la mañana, se muestra "Buenos días"; si es por la tarde, "Buenas tardes"; y si es por la noche, "Buenas noches".

3. **Consulta a la base de datos**: Una vez que se determina si es mañana, tarde o noche, el script realiza una consulta a una base de datos MariaDB. En esta base de datos, hay una tabla llamada `imagenes_horario` que contiene los nombres de las imágenes correspondientes a cada momento del día (por ejemplo, una imagen para la mañana, otra para la tarde y otra para la noche). El script busca la imagen apropiada para el momento del día.

4. **Generación de la página web**: Finalmente, el script genera una página HTML que muestra el saludo correspondiente y la imagen relacionada con ese momento del día. La imagen se carga desde una carpeta de imágenes en el servidor.

La aplicación adapta dinámicamente tanto el saludo como la imagen mostrada a los visitantes en función de la hora actual, consultando la base de datos para obtener los nombres de las imágenes que deben mostrarse en cada franja horaria.
