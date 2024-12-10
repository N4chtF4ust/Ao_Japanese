<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard</title>

    <style>
        @import url('https://fonts.googleapis.com/css2?family=Open+Sans:ital,wght@0,300..800;1,300..800&family=Permanent+Marker&display=swap');

        :root{
            --background_color--:#EEEBDD;
            --font_color--:#810000;
        }

        body {
            font-family: "Open Sans", sans-serif;
            margin: 0;
            padding: 0;
            background-color: var(--background_color--);
        }

        header {
            background-color: var(--background_color--);
            color: var(--font_color--);
            padding: 15px;
            text-align: center;
        }

        table {
            width: 80%;
            margin: 2% auto;
            border-collapse: collapse;
            background-color: white;
            border:1px solid var(--font_color--);
            box-shadow: 0 2px 5px rgba(0, 0, 0, 0.1);
        }

        th, td {
            padding: 12px;
            text-align: center;
            border: 1px solid var(--font_color--);
        }

        th {
            background-color: var(--font_color--);
            color: white;
        }

        td {
            background-color: var(--background_color--);
        }
    </style>

</head>

<body>

    <?php
     
    echo"<header>
        <h1>Dashboard Lods</h1>
    </header>";

        echo"<table>
            <thead>
                <tr>
                    <th>Ticket</th>
                    <th>Name</th>
                    <th>Status</th>
                    <th></th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                </tr>
                <tr>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                </tr>
                <tr>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                </tr>
                <tr>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                </tr>
            </tbody>
        </table>";

        ?>
</body>

</html>