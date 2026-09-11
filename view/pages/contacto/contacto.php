<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Contacto - Politécnico San Valero</title>
  <style>
    * { box-sizing: border-box; }
    html, body {
      margin: 0;
      padding: 0;
      min-height: 100%;
      font-family: 'Montserrat', Arial, sans-serif;
      background: #fff;
      color: #484848;
      overflow-x: hidden;
    }
    .contact-page {
      max-width: 1050px;
      margin: 0 auto;
      padding: 55px 30px;
    }
    h1 {
      margin: 0 0 25px;
      color: #ea8b15;
      font-size: 36px;
      font-weight: 400;
    }
    .contact-grid {
      display: grid;
      grid-template-columns: repeat(2, minmax(0, 1fr));
      gap: 25px;
    }
    .contact-card {
      border-top: 3px solid #ea8b15;
      padding: 22px;
      background: #f8f8f8;
    }
    .contact-card h2 {
      margin: 0 0 12px;
      font-size: 21px;
      font-weight: 400;
      color: #333;
    }
    .contact-card p {
      margin: 7px 0;
      line-height: 1.6;
    }
    @media (max-width: 650px) {
      .contact-page { padding: 35px 18px; }
      .contact-grid { grid-template-columns: 1fr; }
      h1 { font-size: 30px; }
    }
  </style>
</head>
<body>
  <main class="contact-page">
    <h1>Contacto</h1>
    <div class="contact-grid">
      <section class="contact-card">
        <h2>Fundación Dominicana San Valero</h2>
        <p>C/ Restauración No. 1, Guaricanos, Santo Domingo Norte, República Dominicana</p>
        <p><strong>Tel.:</strong> 809-688-0404</p>
        <p><strong>Email:</strong> info@fundosva.com</p>
        <p><strong>Horario:</strong> Lunes a viernes: 8:00 AM - 5:00 PM</p>
        <p>Sábados y domingos: Cerrado</p>
      </section>
      <section class="contact-card">
        <h2>Politécnico San Valero</h2>
        <p>C/ Ilustración No. 1, Guaricanos, Santo Domingo Norte, República Dominicana</p>
        <h2>Instituto Politécnico Aragón</h2>
        <p>C/ 2da Esquina Duarte, Proyecto Mirador Norte, Guaricanos, Santo Domingo Norte.</p>
        <h2>Centro Tecnológico Cardenal López Rodríguez</h2>
        <p>C/ Colón No. 2, Santa Bárbara, Zona Colonial, Santo Domingo, D.N.</p>
      </section>
    </div>
  </main>
</body>
</html>