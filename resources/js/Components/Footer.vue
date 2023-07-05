<script setup>
import { Link } from '@inertiajs/inertia-vue3'
import { useStore } from '@/store/mainStore.js'
import { storeToRefs } from 'pinia'
</script>


<template>
<div 
	id="mainFooter"
	class="bg-brand-green text-white px-6 3xl:px-0">
	<div class="max-w-5xl mx-auto">
		
		<div class="h-8 lg:h-12" />

		<div class="flex justify-center">
			<img src="img/brand-challenge.svg" alt="Colesterol challenge" class="w-40 sm:w-60 md:w-72">
		</div>

		<div class="flex justify-between mt-4 md:mt-8">
			<img src="img/brand-white.svg" alt="Colesterol challenge" class="w-40 md:w-48">
			<img src="img/esteve-white.svg" alt="Colesterol challenge" class="w-16 sm:w-20">
		</div>

		<div class="border-t border-white text-xs pt-6 mt-7 space-y-3 lg:flex lg:justify-between lg:space-y-0">
			<div class="">
				<p>&copy; ESTEVE 2018-2023 Este sitio web está dirigido a residentes de España</p>
			</div>

			<div class="divide-x [&>*]:underline [&>*]:px-2">
				<Link :href="route('contact')">Contacto</Link>
				<Link href="#">Aviso Legal</Link>
				<Link href="#">Privacidad</Link>
				<Link href="#">Cookies</Link>
			</div>
		</div>

		<div class="h-8 lg:h-10" />

	</div>
</div>
</template>