<template>
  <div class="card-product" >
    <div class="card-product__inner">
      <img class="card-product__img" :src="require(`../assets/images/${item.img}.png`)" alt="">
      <h2 class="card-product__title"> {{ item.title }}</h2>
      <button-read class="card-product__button" @click="openList"/>
    </div>
  </div>
</template>

<script>
import ButtonRead from '@/components/ButtonRead.vue'
export default {
  name: 'CardProduct',
  components: { ButtonRead },
  props: {
    item: {
      type: Object
    }
  },
  methods: {
    openList() {
      this.$emit('openDescription', this.item)
    }
  },
  
}
</script>

<style lang="scss" scoped>
  .card-product {
    margin: 20px 20px 20px 0;
    &__inner {
      width: 200px;
    }
    &__title {
      font-weight: 500;
      font-size: 18px;
      line-height: 33px;
      color: #EE4248;
      margin: 20px 0;
    }
    &__button {
      font-size: 16px;
    }
  }
  @media (min-width: 821px) {
    .card-product {
     
    }
    
  }
</style>