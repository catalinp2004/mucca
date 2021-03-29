<template>
    <div id="app">
        <div>
            <div class="d-flex">
                <router-link to="/catalog/product">product</router-link>
                <router-link to="/catalog">products</router-link>
            </div>
        </div>
        <transition name="page-change" mode="out-in">
            <router-view class="h-100"></router-view>
        </transition>
    </div>
</template>


<script>
export default {
    name: "App",
}
</script>

<style scoped>

</style>
