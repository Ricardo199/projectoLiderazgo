<?php
include 'dbh.php';
$commentsNewCount = $_POST['commentsNewCount'];
$sql = "SELECT author, comentario FROM comments LIMIT $commentsNewCount, 2";
$sql2 = "SELECT COUNT('author') FROM comments";
$result = mysqli_query($conn, $sql);
$result2 = mysqli_query($conn, $sql2);
if (mysqli_num_rows($result) > $result2) {
  while ($row = mysqli_fetch_assoc($result)) {
    echo "
    <p>
    <td class='px-4 py-3'>
      <div class='flex items-center text-sm'>
        <!-- Avatar with inset shadow -->
        <div class='relative hidden w-8 h-8 mr-3 rounded-full md:block' >
          <img class='object-cover w-full h-full rounded-full' src='https://images.unsplash.com/flagged/photo-1570612861542-284f4c12e75f?ixlib=rb-1.2.1&q=80&fm=jpg&crop=entropy&cs=tinysrgb&w=200&fit=max&ixid=eyJhcHBfaWQiOjE3Nzg0fQ' alt='' loading='lazy' />
          <div class='absolute inset-0 rounded-full shadow-inner' aria-hidden='true'></div>
        </div>
        <div>
          <p class='font-semibold'>"; echo $row['author']; echo"</p>
          <p class='text-xs text-gray-600 dark:text-gray-400'>
            10x Developer
          </p>
        </div>
      </div>
    </td>
    <td class='px-4 py-3 text-sm'>
      $ 863.45
    </td>
    <td class='px-4 py-3 text-xs'>
      <span
        class='px-2 py-1 font-semibold leading-tight text-green-700 bg-green-100 rounded-full dark:bg-green-700 dark:text-green-100'>
        Approved
      </span>
    </td>
    <td class='px-4 py-3 text-sm'>
      "; echo $row['comentario']; echo"
    </td>
    </p>";
  }
} else {
  echo "NoMoreComments";
}