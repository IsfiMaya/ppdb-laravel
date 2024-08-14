<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registration Receipt</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            line-height: 1.6;
        }

        .container {
            width: 100%;
            max-width: 800px;
            margin: 0 auto;
            padding: 20px;
            box-sizing: border-box;
        }

        .header {
            text-align: center;
            margin-bottom: 20px;
        }

        .header img {
            width: 100px;
            height: auto;
        }

        .header h3 {
            font-weight: bold;
            margin: 5px 0;
        }

        .content {
            margin-left: 20px;
        }

        .row {
            display: flex;
            margin-bottom: 10px;
        }

        .label {
            font-weight: 600;
            width: 50%;
        }

        .value {
            width: 50%;
        }
    </style>
</head>

<body>
    <div class="container">
        <div class="header">
            <img src="{{ public_path('images/download_removebg_preview_1.webp') }}" alt="Logo">
            <h3>PENERIMAAN</h3>
            <h3>CALON PESERTA DIDIK BARU 2024/2025</h3>
            <h3>MTS AL-ITTIHAD PEKANBARU</h3>
        </div>
        <div class="content">
            <div class="row">
                <div class="label">Tingkat Kelas</div>
                <div class="value">SMP-IT</div>
            </div>
            <div class="row">
                <div class="label">Tgl Pendaftaran</div>
                <div class="value">{{ $data_diri->created_at }}</div>
            </div>
            <div class="row">
                <div class="label">No. Pendaftaran</div>
                <div class="value">{{ $data_diri->id }}</div>
            </div>
            <div class="row">
                <div class="label">Nama</div>
                <div class="value">{{ $data_diri->nama }}</div>
            </div>
            <div class="row">
                <div class="label">Jenis Kelamin</div>
                <div class="value">{{ $data_diri->jenis_kelamin }}</div>
            </div>
            <div class="row">
                <div class="label">Email</div>
                <div class="value">{{ $data_diri->email }}</div>
            </div>
            <div class="row">
                <div class="label">Telepon</div>
                <div class="value">{{ $data_diri->no_handphone }}</div>
            </div>
            <div class="row">
                <div class="label">Alamat</div>
                <div class="value">{{ $data_diri->alamat }}</div>
            </div>
            <div class="row">
                <div class="label">Besar Biaya</div>
                <div class="value">Rp. 250.000,00</div>
            </div>
            <div class="row">
                <div class="label"><i>Virtual Account</i></div>
                <div class="value">12345678910</div>
            </div>
        </div>
    </div>
</body>

</html>