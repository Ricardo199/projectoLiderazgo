<?php
    include 'dbh.php';
    $commentsNewCount= $_POST['commentsNewCount'];
    $sql = "SELECT * FROM comments LIMIT $commentsNewCount";
    $result =mysqli_query($conn, $sql);
    if (mysqli_num_rows($result) > 0) {
        while ($row = mysqli_fetch_assoc($result)) {
          echo "<p>";
          echo "
            <div class='flex items-center text-sm'>
              <!-- Avatar with inset shadow -->
              <div
                class='relative hidden w-8 h-8 mr-3 rounded-full md:block'
              >
                <img
                  class='object-cover w-full h-full rounded-full'
                  src='https://images.unsplash.com/flagged/photo-1570612861542-284f4c12e75f?ixlib=rb-1.2.1&q=80&fm=jpg&crop=entropy&cs=tinysrgb&w=200&fit=max&ixid=eyJhcHBfaWQiOjE3Nzg0fQ'
                  alt=''
                  loading='lazy'
                />
                <div
                  class='absolute inset-0 rounded-full shadow-inner'
                  aria-hidden='true'
                ></div>
              </div>
              <div>
                <p class='font-semibold'>";
                echo $row['author']; echo 
                "</p>
                <p class='text-xs text-gray-600 dark:text-gray-400'>";
                echo $row['message'];
                echo "
                </p>
              </div>
            </div>
          </td>";
              echo "</p><br>";
        }
    }else{
        echo "There are no comments :(";
    }
?>
