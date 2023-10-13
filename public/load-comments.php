<?php
include 'dbh.php';

$commentsNewCount = $_POST['commentsNewCount'];
$sql = "SELECT author, comentario FROM comments LIMIT $commentsNewCount, 2";
$result = mysqli_query($conn, $sql);

// Check if there are rows in the result
if (mysqli_num_rows($result) >= 0) {
    // Start the table outside of the loop to ensure it's not repeated
    echo "<table class='w-full whitespace-no-wrap'>
        <thead>
            <tr class='text-xs font-semibold tracking-wide text-left text-gray-500 uppercase border-b dark:border-gray-700 bg-gray-50 dark:text-gray-400 dark:bg-gray-800'>
                <th class='px-4 py-3'>Client</th>
                <th class='px-4 py-3'>Amount</th>
                <th class='px-4 py-3'>Status</th>
                <th class='px-4 py-3'>Commentario</th>
            </tr>
        </thead>
        <tbody class='bg-white divide-y dark:divide-gray-700 dark:bg-gray-800'>";

    while ($row = mysqli_fetch_assoc($result)) {
        // Output each row in the table
        echo "<tr class='text-gray-700 dark:text-gray-400'>
            <td>
                <div class='flex items-cen<trter text-sm'>
                    <!-- Avatar with inset shadow -->
                    <div class='relative hidden w-8 h-8 mr-3 rounded-full md:block'>
                        <img class='object-cover w-full h-full rounded-full' src='https://images.unsplash.com/flagged/photo-1570612861542-284f4c12e75f?ixlib=rb-1.2.1?q=80&fm=jpg&crop=entropy&cs=tinysrgb&w=200&fit=max&ixid=eyJhcHBfaWQiOjE3Nzg0fQ' alt='' loading='lazy' />
                        <div class='absolute inset-0 rounded-full shadow-inner' aria-hidden='true'></div>
                    </div>
                    <div>
                        <p class='font-semibold'>" . $row['author'] . "</p>
                        <p class='text-xs text-gray-600 dark:text-gray-400'>10x Developer</p>
                    </div>
                </div>
            </td>
            <td class='px-4 py-3 text-sm'>$ 863.45</td>
            <td class='px-4 py-3 text-xs'>
                <span class='px-2 py-1 font-semibold leading-tight text-green-700 bg-green-100 rounded-full dark:bg-green-700 dark:text-green-100'>Approved</span>
            </td>
            <td class='px-4 py-3 text-sm'>" . $row['comentario'] . "</td>
        </tr>";
    }

    // Close the table after the loop
    echo "</tbody></table>";
} else {
    echo "NoMoreComments";
}
?>