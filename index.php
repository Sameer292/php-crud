<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>PHP CRUD - Display</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <script src="./scripts/script.js" defer></script>
</head>

<body class="bg-zinc-900 text-white">
    <div class="m-4">
        <h1 class="text-3xl mb-10">🐘PHP CRUD/Display</h1>
        <button class="add-student text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm w-full sm:w-auto px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">Add Student</button>
    </div>
    <div class="relative overflow-x-auto shadow-md mt-5">
        <table class="w-full text-md text-left rtl:text-right text-gray-500 dark:text-gray-400">
            <thead class="text-md text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                <tr>
                    <th scope="col" class="px-6 py-3">
                        S.N.
                    </th>
                    <th scope="col" class="px-6 py-3">
                        Name
                    </th>
                    <th scope="col" class="px-6 py-3">
                        Email
                    </th>
                    <th scope="col" class="px-6 py-3">
                        Faculty
                    </th>
                    <th scope="col" class="px-6 py-3">
                        Roll
                    </th>
                    <th scope="col" class="px-6 py-3">
                        Action
                    </th>
                </tr>
            </thead>
            <tbody>
                <?php
                include "./includes/connect.php";

                // sql query to display from table
                $sql = "SELECT * FROM students";
                $result = mysqli_query($conn, $sql);

                if (!$result) {
                    die(mysqli_connect_error());
                }

                if (mysqli_num_rows($result) > 0) {
                    // fetch each row from the table
                    while ($row = mysqli_fetch_assoc($result)) {
                        echo '
                        <tr
                    class="odd:bg-white odd:dark:bg-gray-900 even:bg-gray-50 even:dark:bg-gray-800 border-b dark:border-gray-700">
                    <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                        ' . $row["id"] . '
                    </th>
                    <td class="px-6 py-4">
                    ' . $row["name"] . '
                    </td>
                    <td class="px-6 py-4">
                    ' . $row["email"] . '
                    </td>
                    <td class="px-6 py-4">
                    ' . $row["faculty"] . '
                    </td>
                    <td class="px-6 py-4">
                    ' . $row["roll"] . '
                    </td>
                    <td class="px-6 py-4 flex gap-4">
                        <a href="./includes/update.php?updateid=' . $row["id"] . '" class="font-medium text-blue-500 dark:text-blue-500 hover:underline">Edit</a>
                        <a href="./includes/delete.php?deleteid=' . $row["id"] . '" class="font-medium text-red-500 dark:text-red-500 hover:underline">Delete</a>
                    </td>
                </tr>';
                    }
                }
                ?>
            </tbody>
        </table>
    </div>

</body>

</html>