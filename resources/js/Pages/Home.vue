<script setup>
import PageLayout from '@/Layouts/PageLayout.vue'
import { useStore } from '@/store/mainStore.js'
import { storeToRefs } from 'pinia'

const store = useStore()
const { user } = storeToRefs(store)

</script>

<template>
<PageLayout>


</PageLayout>
</template>




<style lang="scss" scoped>

</style>