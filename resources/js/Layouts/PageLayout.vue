<script setup>
import { onMounted, computed, watch, ref, onUnmounted } from 'vue'
import { usePage, router } from '@inertiajs/inertia-vue3'
import { useStore } from '@/store/mainStore.js'
import { storeToRefs } from 'pinia'
import Cookies from "js-cookie";

import Header from '@/Components/Header.vue'
import Footer from '@/Components/Footer.vue'
import Modal from '@/Components/ModalBlocked.vue'

const page = usePage()
const url = ref(page.url.value)
const store = useStore()
const {
	user,
	site_allowed,
	modal_contact
} = storeToRefs(store)


const showModal = computed(() => {
	document.body.classList.remove('overflow-hidden')
	return !site_allowed.value
})

const allowSite = () => {
	if( user.value ) return

    const allow = Cookies.get("specialist") ? true : false;

	switch(url.value){
        case '/login':
        case '/registrarme':
            store.allowSite(true)
            break;
		default:
            store.allowSite(allow)
	}
}



watch(url, val => {
	const allow = Cookies.get("specialist") ? true : false;

    switch (val) {
        case '/login':
        case '/registrarme':
            store.allowSite(true)
            break;
        default:
            store.allowSite(allow)
    }
})



watch(user, val => {
	if(val) store.allowSite(true)
})



onMounted(() => allowSite())
</script>


<template>
<div id="mainLayout">
	<Header />
	<slot />
	<Footer />

	<Teleport to="body">
		<Modal v-if="showModal" />
	</Teleport>
</div>
</template>
