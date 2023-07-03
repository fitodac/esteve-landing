<script setup>
/**
NOTA IMPORTANTE PARA ESTE COMPONENTE:
El menú en mobile está flotante. Cuando se
maquetó, la posición top de los elementos
.menu y .topbar se han fijado de acuerdo a
la altura del menú en ese momento, y esto
varía de acuerdo a la cantidad de items que
había en el menú... entónces, si se agrega
un nuevo item/link al menú, habrá que modificar
la posición "top" de los elementos .menu y .topbar.
 */
import { ref, watch, onMounted } from 'vue'
import { useWindowScroll } from '@vueuse/core'
import { Link, usePage } from '@inertiajs/inertia-vue3'
import { useStore } from '@/store/mainStore.js'
import { storeToRefs } from 'pinia'

const page = usePage()
const url = page.url.value
const header = ref(null)
const store = useStore()
const { user, scroll } = storeToRefs(store)

const { y } = useWindowScroll()
const y_diff = 90

const navToggle = () => {
	menu_open.value = !menu_open.value
}

onMounted(() => {
	window.addEventListener('resize', () => menu_open.value = false)
})

watch(y, val => {
	if( val >= 25 )
		store.setScroll(true)
	else
		store.setScroll(false)
})

const menu_open = ref(false)
const handleTopBarAction = (cb) => cb()


const toggleMenu = () => {
	setTimeout(() => {
		if( menu_open.value ){
			menu_open.value = false
			document.body.classList.remove('overflow-hidden')
		}else{
			menu_open.value = true
			document.body.classList.add('overflow-hidden')
		}
	}, 100)
}
</script>



<template>
<section 
	id="mainHeader" 
	ref="header" 
	class="bg-white px-6 top-0 inset-x-0 fixed z-30 will-change-auto 2xl:px-0"
	:class="{'shadow-xl': (y > y_diff)}">

	<div 
		class="container mx-auto relative transition-all will-change-auto"
		:class="{'md:-mt-14': (y > y_diff)}">
		<div class="py-1 flex justify-between items-center">
			<h1>
				<Link :href="route('home')" class="w-44 block md:w-60">
					<img src="img/brand.svg" alt="Colesterol challenge" class="w-full">
				</Link>
			</h1>

			<button 
				class="text-brand-orange leading-none md:hidden"
				@click="navToggle">
				<i v-if="!menu_open" class="ri-menu-3-fill text-2xl"></i>
				<i v-if="menu_open" class="ri-close-line text-3xl -mt-1"></i>
			</button>

			<div class="hidden space-x-2 md:block">
				<Link class="bg-brand-orange text-white text-sm font-bold px-5 py-2.5 inline-flex justify-center items-center gap-1 rounded transition-all select-none will-change-auto lg:py-3 hover:opacity-80">
					<i class="ri-user-3-line"></i>
					<span>Registro</span>
				</Link>

				<Link class="bg-brand-green text-white text-sm font-bold px-5 py-2.5 inline-flex justify-center items-center gap-1 rounded transition-all select-none will-change-auto lg:py-3 hover:opacity-80">
					<i class="ri-user-3-line"></i>
					<span>Acceso</span>
				</Link>
			</div>
		</div>
	</div>


	<div 
		class="bg-white inset-x-0 top-8 absolute px-6 transition-all will-change-auto md:relative md:top-0 2xl:px-0"
		:class="{'pointer-events-none opacity-0 md:opacity-100': !menu_open, 'pointer-events-auto': menu_open}">
		<div 
			class="container py-6 mx-auto md:max-w-5xl md:py-4">
			<div class="grid gap-5 lg:flex">
				
				<img 
					src="img/brand.svg" 
					alt="Colesterol challenge" 
					class="-top-0.5 relative transition-all pointer-events-none will-change-auto"
					:class="y > y_diff ? 'hidden lg:block w-40 opacity-100' : 'hidden w-0 opacity-0'">

				<div class="w-full grid gap-5 md:flex md:justify-center lg:gap-10">
					<Link href="#en-que-consiste" 					class="nav-item">EN QUÉ CONSISTE</Link>
					<Link href="#challenges" 								class="nav-item">CHALLENGES</Link>
					<Link href="#bibliografia" 							class="nav-item">BIBLIOGRAFÍA</Link>
					<Link href="#coordinacion-cientifica" 	class="nav-item">COORDINACIÓN CIENTÍFICA</Link>
					<Link href="#coordinacion-cientifica" 	class="nav-item">COORDINACIÓN CIENTÍFICA</Link>
					<Link :href="route('contact')" 					class="nav-item">CONTACTO</Link>

					<div class="mt-3 flex gap-x-2 md:hidden">
						<div class="flex-1">
							<Link class="bg-brand-orange text-white text-sm font-bold w-full p-2 inline-flex justify-center items-center gap-1 rounded">
								<i class="ri-user-3-line"></i>
								<span>Registro</span>
							</Link>
						</div>

						<div class="flex-1">
							<Link class="bg-brand-green text-white text-sm font-bold w-full p-2 inline-flex justify-center items-center gap-1 rounded">
								<i class="ri-user-3-line"></i>
								<span>Acceso</span>
							</Link>
						</div>
					</div>

				</div>
			</div>
		</div>
	</div>

</section>

<div class="bg-white h-9 transition-all will-change-auto relative md:h-[94px] lg:h-[98px] xl:h-[104px]" :class="{'-top-14': (y > y_diff)}"></div>
</template>

<style lang="scss" scoped>
.nav-item{
	@apply
	text-brand-orange
	text-sm
	font-ropa
	font-semibold
	leading-none
	relative
	whitespace-nowrap
	select-none;

	&::after{
		content: '';
		
		@apply
		bg-brand-orange
		left-1/2
		right-1/2
		-bottom-0.5
		absolute
		h-0.5
		hidden
		opacity-80
		transition-all
		md:block;
	}

	&:hover::after{
		@apply
		inset-x-0;
	}
}
</style>