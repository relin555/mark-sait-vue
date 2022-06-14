<template>
  <div class="home-page">
    <div class="home-page__inner">
      <div class="home-page__main conteiner">
        <div class="home-page__main-text-block">
          <div class="home-page__main-title-wrapper">
            <a name="home"></a>
            <h1 class="home-page__main-title home-page__text_left">
              Компания
              <span>Бухгалтер в Ресурсе</span>
            </h1>
          </div>
          <div class="home-page__main-subtitle-wrapper">
            <p class="home-page__main-subtitle home-page__text_left">
              Сопровождает ваш бухгалтерский и налоговый учёт на каждом этапе.
              Берёт на себя кадровое делопроизводство. Оказывает юридические
              услуги.
            </p>
          </div>
          <button-read class="home-page__main-button" />
        </div>
        <div class="home-page__main-img-wrapper">
          <ul class="home-page__main-text-items">
            <li class="home-page__main-text-item"
            v-for="item in textMain"
            :key="item.text"
            >{{ item.text }}</li>
          </ul>
          <img
            class="home-page__main-bg"
            src="../assets/images/pana.png"
            alt=""
          />
        </div>
      </div>

      <div class="home-page__welcome">
        <div class="home-page__welcome-inner conteiner">
          <a name="about"></a>
          <div class="home-page__welcome-img-wrapper">
            <img
              class="home-page__welcome-bg"
              src="../assets/images/pana2.png"
              alt=""
            />
          </div>
          <div class="home-page__welcome-text-block">
            <h2 class="home-page__welcome-title home-page__text_left">
              Добро пожаловать в
              <span>Бухгалтер в Ресурсе</span>
            </h2>
            <p class="home-page__welcome-subtitle home-page__text_left">
              Более 2-х лет наша компания оказывает бухгалтерские услуги и
              помогает малому и среднему бизнесу свободно расти и процветать в
              своей нише без давления обременяющих платежей.
              <br />
              <br />
              У 5-ти компаний мы
              восстановили бухгалтерский и налоговый учёт с нуля, устранили
              глобальные ошибки в операционной деятельности.
              <br />
              <br />
              50%-ам клиентов
              создали комфортные и безопасные условия для работы без притязаний
              налоговой и банков.
            </p>
          </div>
        </div><a name="product"></a>
      </div>
      
      <div class="home-page__product">
        <div class="home-page__product-inner conteiner">
          <h2 class="home-page__product-title">Мы работаем для вас</h2>
          <div class="home-page__product-card-wrapper">
            <card-product
              class="home-page__product-card"
              v-for="item in cardProducts"
              :key="item.img"
              :item="item"
              @openDescription="openDescription"
            />
          </div>
        </div>
      </div>

      <div class="home-page__list-services" v-if="listOpen" ref="openMenu">
        <div class="home-page__list-services-inner">
          <div class="home-page__list-services-btn-wrapper">
            <button class="home-page__list-services-btn" @click="closedMenu">X</button>
          </div>
          <ul class="home-page__list-services-items">
            <li class="home-page__list-services-item"
            v-for="item in listServices.services" :key="item.services">{{ item }}</li>
          </ul>
          <div class="home-page__list-services-price-wrapper">
            <h4 class="home-page__list-services-price">{{ listServices.price }}</h4>
          </div>
        </div>
      </div>
    </div>
  </div>
</template>

<script>
import ButtonRead from "@/components/ButtonRead.vue";
import { mapGetters } from "vuex";
import CardProduct from "../components/CardProduct.vue";
export default {
  components: { ButtonRead, CardProduct },
  data() {
    return {
      listServices: {},
      listOpen: false
    }
  },
  methods: {
    openDescription(services) {
      this.listServices = services
      this.listOpen = !this.listOpen
      console.log(1)
    },
    closedMenu() {
      this.listOpen = false
    }
  },
  computed: {
    ...mapGetters(["cardProducts", "textMain"]),
  },
  mounted() {
    let vm = this;
    document.addEventListener('click', function(item) {
      if(item.target === vm.$refs['openMenu']) {
        vm.listOpen = false
      }
    })
  }
};
</script>

<style lang="scss" scoped>
.home-page {
  padding-top: 80px;
  &__main-text-block {
    display: flex;
    flex-direction: column;
    justify-content: center;
    align-items: center;
    overflow: hidden;
  }
  &__main-title-wrapper {
    overflow: hidden;
  }
  &__main-subtitle-wrapper {
    overflow: hidden;
  }
  &__main-bg {
    object-fit: contain;
    width: 100%;
    height: auto;
    animation: animBg 3.5s;
  }
  &__main-title {
    text-align: center;
    font-size: 24px;
    line-height: 33px;
    animation: animTitle 1.5s;
  }
  &__main-title > span {
    color: #ee4248;
  }
  &__main-subtitle {
    text-align: center;
    padding: 20px 0;
    animation: animTitle 2.5s;
  }
  &__main-button {
    margin-bottom: 20px;
    animation: animButton 4s;
  }
  &__main-img-wrapper {
    display: flex;
    justify-content: center;
    align-items: center;
    overflow: hidden;
    position: relative;
  }
  &__main-text-items {
    position: absolute;
    top: 0;
    left: 0;
  }
  &__main-text-item {
    font-size: 14px;
    transform: translateX(-101%);
  }
  &__welcome {
    background: #f7f7f7;
    margin: 25px 0;
  }
  &__welcome-img-wrapper {
    object-fit: contain;
    display: flex;
    justify-content: center;
  }
  &__welcome-img-wrapper > img {
    width: 100%;
  }
  &__welcome-title {
    text-align: center;
    font-size: 24px;
    line-height: 33px;
    padding-top: 20px;
  }
  &__welcome-title > span {
    color: #ee4248;
  }
  &__welcome-subtitle {
    text-align: center;
    padding: 20px 0;
  }
  &__product-title {
    text-align: center;
    font-weight: 500;
    font-size: 24px;
    line-height: 30px;
    padding: 30px 0;
  }
  &__product-card-wrapper {
    display: flex;
    width: 100%;
    overflow-x: scroll;
  }
   &__list-services {
      position: fixed;
      background: rgba(238, 66, 72, 0.8);
      top: 40px;
      width: 100%;
      height: 100%;
      display: flex;
      justify-content: center;
      align-items: center;
      padding: 20px;
    }
    &__list-services-inner {
      background: rgba(246, 246, 246, 1);
      position: relative;
      box-shadow: 11px 14px 14px 1px;
      border-radius: 15px;
    }
    &__list-services-items {
      padding: 25px;
      transition: .2s;
    }
    &__list-services-btn-wrapper {
      position: absolute;
      right: 10px;
      top: 10px;
    }
    &__list-services-btn {
      width: 20px;
      height: 20px;
      background: #ee4248;
      border-radius: 50%;
      display: flex;
      justify-content: center;
      align-items: center;
      box-shadow: 5px 5px 12px;
    }
    &__list-services-item {
      padding-bottom: 20px;
      font-size: 12px;
      text-transform: uppercase;
      line-height: 16px;
      font-weight: 700;
      list-style-type: square;
    }
    &__list-services-item:last-child {
      padding-bottom: 0px;
    }
    &__list-services-price-wrapper {
      padding: 0 20px 20px 20px;
    }
    &__list-services-price {
      font-size: 16px;
      text-transform: uppercase;
      color: #EE4248;
    }
}
@media (min-width: 821px) {
  .home-page {
    &__main {
      display: flex;
      justify-content: space-between;
    }
    &__text_left {
      text-align: inherit;
    }
    &__main-text-block {
      max-width: 545px;
      align-items: flex-start;
    }
    &__main-subtitle {
      padding: 24px 0;
    }
    &__main-title {
      font-size: 48px;
      line-height: 133.69%;
      max-width: 545px;
    }
    &__welcome-inner {
      display: flex;
      align-items: center;
      justify-content: space-between;
    }
    &__welcome-img-wrapper {
      width: auto;
      padding: 30px 30px 30px 0;
    }
    &__welcome-img-wrapper > img {
      width: auto;
    }
    &__welcome-text-block {
      max-width: 520px;
    }
    &__welcome-subtitle {
      font-size: 18px;
      line-height: 27px;
    }
    &__product-card-wrapper {
      display: flex;
      justify-content: space-between;
      width: auto;
      overflow-x: inherit;
    }
   
  }
}

// animation

@keyframes animTitle {
  0% {
    transform: translateY(100vh);
  }
  100% {
    transform: translateY(0);
  }
}
@keyframes animButton {
  0% {
    opacity: 0;
  }
  70% {
    opacity: 0;
  }
  100% {
    opacity: 1;
  }
}
@keyframes animBg {
  0% {
    transform: translateX(100vw);
  }
  100% {
    transform: translateX(0);
  }
}
</style>
