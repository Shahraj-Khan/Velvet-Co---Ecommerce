<template>
  <transition name="loader">
    <div v-if="loading" class="loader">

      <div class="particles">
        <span v-for="n in 18" :key="n"></span>
      </div>

      <div class="loader-card">

        <div class="watch">

          <div class="strap top"></div>

          <div class="dial">

            <div class="center"></div>

            <div class="hand hour"></div>

            <div class="hand minute"></div>

          </div>

          <div class="strap bottom"></div>

        </div>

        <h1>VELVET CO</h1>

        <p>Luxury Watch Collection</p>

        <div class="progress">

          <div class="progress-fill"></div>

        </div>

        <span class="loading-text">
          Preparing Your Luxury Experience...
        </span>

      </div>

    </div>
  </transition>
</template>

<script setup>
defineProps({
  loading: Boolean
});
</script>

<style scoped>

:root{
  --gold:#E5CC91;
}

.loader{

  position:fixed;
  inset:0;
  z-index:999999;

  background:
  radial-gradient(circle at top,#232323,#0f0f0f);

  display:flex;
  justify-content:center;
  align-items:center;

  overflow:hidden;
}

/* ---------- Glass Card ---------- */

.loader-card{

  width:430px;

  padding:55px 45px;

  border-radius:28px;

  background:rgba(255,255,255,.04);

  backdrop-filter:blur(20px);

  border:1px solid rgba(229,204,145,.18);

  text-align:center;

  position:relative;

  box-shadow:
  0 0 60px rgba(229,204,145,.08);
}

/* ---------- Watch ---------- */

.watch{

  width:130px;
  margin:auto;

  animation:float 3s ease-in-out infinite;
}

.strap{

  width:34px;
  height:42px;

  margin:auto;

  background:#2a2a2a;

  border-left:2px solid #E5CC91;
  border-right:2px solid #E5CC91;
}

.dial{

  width:120px;
  height:120px;

  margin:auto;

  border-radius:50%;

  border:4px solid #E5CC91;

  background:#161616;

  position:relative;

  box-shadow:
  0 0 25px rgba(229,204,145,.4);

  animation:rotateWatch 10s linear infinite;
}

.center{

  width:10px;
  height:10px;

  border-radius:50%;

  background:#E5CC91;

  position:absolute;

  top:50%;
  left:50%;

  transform:translate(-50%,-50%);
}

.hand{

  position:absolute;

  left:50%;
  bottom:50%;

  transform-origin:bottom;
}

.hour{

  width:4px;
  height:28px;

  background:#E5CC91;

  transform:
  translateX(-50%)
  rotate(35deg);
}

.minute{

  width:2px;
  height:42px;

  background:white;

  transform:
  translateX(-50%)
  rotate(120deg);
}

/* ---------- Typography ---------- */

h1{

  margin-top:35px;

  color:#fff;

  letter-spacing:8px;

  font-size:40px;
}

p{

  color:#bdbdbd;

  letter-spacing:2px;

  margin-top:10px;
}

/* ---------- Progress ---------- */

.progress{

  margin:40px auto 20px;

  width:320px;

  height:8px;

  background:#2d2d2d;

  border-radius:30px;

  overflow:hidden;
}

.progress-fill{

  height:100%;

  width:35%;

  border-radius:30px;

  background:
  linear-gradient(
  90deg,
  #E5CC91,
  #fff7d6,
  #E5CC91);

  animation:loading 1.4s infinite;
}

.loading-text{

  color:#d8d8d8;

  letter-spacing:2px;

  font-size:13px;
}

/* ---------- Particles ---------- */

.particles span{

  position:absolute;

  width:5px;
  height:5px;

  border-radius:50%;

  background:#E5CC91;

  opacity:.5;

  animation:particle 8s linear infinite;
}

.particles span:nth-child(n){

  left:calc(5% * var(--i));
}

.particles span{

  left:calc(100% * (var(--i,1) / 18));
}

.particles span:nth-child(odd){

  animation-duration:10s;
}

/* ---------- Animations ---------- */

@keyframes float{

  50%{

    transform:translateY(-12px);
  }
}

@keyframes rotateWatch{

  from{

    transform:rotate(0deg);
  }

  to{

    transform:rotate(360deg);
  }
}

@keyframes loading{

  from{

    transform:translateX(-120%);
  }

  to{

    transform:translateX(320px);
  }
}

@keyframes particle{

  from{

    transform:translateY(120vh);

    opacity:0;
  }

  30%{

    opacity:.7;
  }

  to{

    transform:translateY(-120px);

    opacity:0;
  }
}

.loader-enter-active,
.loader-leave-active{

  transition:.8s ease;
}

.loader-enter-from,
.loader-leave-to{

  opacity:0;
  transform:scale(1.05);
}

</style>