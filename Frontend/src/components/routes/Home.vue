<template>
  <div class="container">
    <div class="row">
      <div class="col-2">
          <img src="../../assets/undraw_welcome_3gvl.png" alt="">
      </div>
      <div class="col-2 text-left">
        <h1 class="text-center">Üdvözlöm</h1>
        <p class="motto">Nehéz elképzelni a városi stílust sportcipő nélkül.
            A cipők számos színváltozata közül választhat.</p>
            <p class="motto">Ingyenes szállítás 40 000 Ft felett. Stílusok: Elegáns, Modern, Fényűző, Sportos, Szabadidő, Trendi, Egyedi.</p>
      </div>
    </div>
  </div>
</template>

<script>
export default {
  name: "Home",
};
</script>

<style>
@import url('https://fonts.googleapis.com/css2?family=Indie+Flower&display=swap');
h1{
  font-family: 'Pacifico', cursive;
}
.motto{
  font-weight:bold;
  font-family: 'Indie Flower', cursive;
  font-size: 1.5rem;
  margin-left: 35px;
}
.row{
  display: flex;
  align-items: center;
  flex-wrap: wrap;
  justify-content: space-around;
}
.col-2{
  flex-basis: 50%;
  min-width: 300px;
}
.col-2 img{
  max-width: 100%;
  padding: 50px 0;
}
</style>