<?php
include 'dbh.php'; // Incluye el archivo de conexión a la base de datos

$commentsNewCount = $_POST['commentsNewCount']; // Obtiene el valor de "commentsNewCount" de la solicitud POST

// Construye una consulta SQL para recuperar comentarios de la base de datos
$sql = "SELECT author, comentario FROM comments LIMIT $commentsNewCount, 2";

// Ejecuta la consulta SQL utilizando la conexión a la base de datos
$result = mysqli_query($conn, $sql);

// Verifica si hay filas en el resultado
if (mysqli_num_rows($result) >= 0) {
    // Si hay filas, comienza a generar una tabla HTML

    // Muestra las etiquetas de apertura de la tabla
    echo "<table class='w-full whitespace-no-wrap'>
        <thead>
            <tr class='text-xs font-semibold tracking-wide text-left text-gray-500 uppercase border-b dark:border-gray-700 bg-gray-50 dark:text-gray-400 dark:bg-gray-800'>
                <th class='px-4 py-3'>Cliente</th>
                <th class='px-4 py-3'>Monto</th>
                <th class='px-4 py-3'>Estado</th>
                <th class='px-4 py-3'>Commentarios</th>
            </tr>
        </thead>
        <tbody class='bg-white divide-y dark:divide-gray-700 dark:bg-gray-800'>";

    // Recorre las filas en el resultado de la base de datos
    while ($row = mysqli_fetch_assoc($result)) {
        // Muestra cada fila en la tabla
        echo "<tr class='text-gray-700 dark:text-gray-400'>
            <td>
                <div class='flex items-center text-sm'>
                    <!-- Avatar con sombra interior -->
                    <div class='relative hidden w-8 h-8 mr-3 rounded-full md:block'>
                        <img class='object-cover w-full h-full rounded-full' src='https://images.unsplash.com/flagged/photo-1570612861542-284f4c12e75f?ixlib=rb-1.2.1?q=80&fm=jpg&crop=entropy&cs=tinysrgb&w=200&fit=max&ixid=eyJhcHBfaWQiOjE3Nzg0fQ' alt='' loading='lazy' />
                        <div class='absolute inset-0 rounded-full shadow-inner' aria-hidden='true'></div>
                    </div>
                    <div>
                        <p class='font-semibold'>" . $row['author'] . "</p>
                        <p class='text-xs text-gray-600 dark:text-gray-400'>Desarrollador 10x</p>
                    </div>
                </div>
            </td>
            <td class='px-4 py-3 text-sm'>$ 863.45</td>
            <td class='px-4 py-3 text-xs'>
                <span class='px-2 py-1 font-semibold leading-tight text-green-700 bg-green-100 rounded-full dark:bg-green-700 dark:text-green-100'>Aprobado</span>
            </td>
            <td class='px-4 py-3 text-sm'>" . $row['comentario'] . "</td>
        </tr>";
    }

    // Muestra las etiquetas de cierre de la tabla
    echo "</tbody></table>";
} else {
    // Si no hay filas en el resultado, muestra "NoMoreComments"
    echo "NoMoreComments";
}

// Cierra la conexión a la base de datos al final del script
mysqli_close($conn);
?>

