<template>
  <div class="container-fluid bg-dark footer">
    <div class="row">
      <div class="col">
        <ul>
          <h5>Kapcsolat</h5>
          <li>+36-20-555-555</li>
          <li>CipoShop@gmail.com</li>
          <li>@CipoShop</li>
        </ul>
      </div>
      <div class="col">
        <ul>
          <h5>Támogatók</h5>
          <li>Nike</li>
          <li>Adidas</li>
          <li>Puma</li>
        </ul>
      </div>
      <div class="col">
        <ul>
          <h5>Oldalak</h5>
          <li><i class="bi bi-instagram"></i></li>
          <li><i class="bi bi-facebook"></i></li>
          <li><i class="bi bi-google"></i></li>
        </ul>
      </div>
    </div>
  </div>
</template>

<script>
export default {};
</script>

<style>
@import url('https://fonts.googleapis.com/css2?family=Indie+Flower&display=swap');
@import url('https://fonts.googleapis.com/css2?family=Pacifico&display=swap');
.footer {
  bottom: 0;
}
.footer p {
  color: white;
  padding: 15px;
}
.col ul {
  margin-top: 10px;
  color: white;
}
.col ul li {
  list-style-type: none;
  font-family: 'Indie Flower', cursive;
}
.col li:hover{
  margin-left: 10px;
}
.col ul h5{
  font-family: 'Pacifico', cursive;
}
</style>