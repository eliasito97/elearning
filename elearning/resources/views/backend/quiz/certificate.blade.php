<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ __('Certificate - iLearn Academy') }}</title>
    <style>
        body {
            font-family: 'Arial', sans-serif;
            margin: 0;
            padding: 0;
            background-color: #f8f9fa;
        }

        .certificate-container {
            width: 100%;
            max-width: 900px;
            margin: 50px auto;
            padding: 40px;
            border: 10px solid #d4b69c;
            background-color: #ffffff;
            text-align: center;
            box-shadow: 0 5px 15px rgba(0, 0, 0, 0.1);
        }

        .certificate-header {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-bottom: 20px;
        }

        .certificate-header img {
            max-height: 80px;
        }

        .certificate-title {
            font-size: 30px;
            font-weight: bold;
            color: #0578be;
            text-transform: uppercase;
        }

        .certificate-body {
            margin: 20px 0;
        }

        .certificate-body h2 {
            font-size: 26px;
            color: #333333;
            margin-bottom: 10px;
        }

        .certificate-body p {
            font-size: 16px;
            color: #555555;
            line-height: 1.6;
        }

        .certificate-footer {
            margin-top: 40px;
            display: flex;
            justify-content: space-between;
            align-items: center;
        }

        .signature {
            text-align: center;
        }

        .signature img {
            max-height: 50px;
        }

        .signature p {
            font-size: 14px;
            margin-top: 5px;
            color: #333333;
        }
    </style>
</head>
<body>
<div class="certificate-container">
    <div class="certificate-header">
        <!-- Logo placeholder -->
        <img src="{{asset('frontend/dist/images/logo/logo.png')}}" alt="Logo"  />
    </div>

    <div class="certificate-title">{{ __('Certificado de Finalización') }}</div>

    <div class="certificate-body">
        <h2>{{ __('This Certifies That') }}</h2>
        <p>
            <strong style="font-size: 22px; color: #d4b69c;">{{ $student->name }} {{ $student->middname }} {{ $student->lastname }} {{ $student->lastname2 }}</strong>
        </p>
        <p>{{ __('Ha completado satisfactoriamente el curso:') }}</p>
        <p>
            <strong style="font-size: 20px; color: #0578be;">{{$course->title_en}}</strong>
        </p>
        <p>{{ __('Fecha de emisión:') }} {{ now()->format('d/m/Y') }}</p>
    </div>

    <div class="certificate-footer">
        <div class="signature">
            <img src="{{ asset('path-to-signature.png') }}" alt="Signature" />
            <p>{{ __('Director') }}</p>
        </div>

        <div class="signature">
            <img src="{{ asset('path-to-seal.png') }}" alt="Seal" />
            <p>{{ __('iLearn Academy') }}</p>
        </div>
    </div>
</div>
</body>
</html>
