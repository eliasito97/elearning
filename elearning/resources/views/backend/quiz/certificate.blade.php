<!-- resources/views/certificate.blade.php -->
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ __('Certificado de Curso') }}</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            text-align: center;
            padding: 50px;
        }
        .certificate {
            border: 5px solid #000;
            padding: 30px;
            width: 80%;
            margin: 0 auto;
        }
        h1 {
            font-size: 36px;
            margin-bottom: 20px;
        }
        h2 {
            font-size: 24px;
            margin-bottom: 10px;
        }
        .content {
            font-size: 20px;
            margin-bottom: 20px;
        }
        .footer {
            font-size: 16px;
            margin-top: 40px;
        }
    </style>
</head>
<body>
<div class="certificate">
    <h1>{{ __('Certificado de Finalización') }}</h1>
    <h2>{{ $student->name }} {{ $student->middname }} {{ $student->lastname }} {{ $student->lastname2 }}</h2>
    <p class="content">{{ __('Ha completado satisfactoriamente el curso:') }}</p>
    <h3>{{ $course->title_en}}</h3>
    <p class="footer">{{ __('Fecha de emisión:') }} {{ now()->format('d/m/Y') }}</p>
</div>
</body>
</html>
