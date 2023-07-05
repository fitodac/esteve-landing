<script setup>
import PageLayout from '@/Layouts/PageLayout.vue'
import PageHeader from '@/Components/PageHeader.vue'
import InputError from '@/Components/Form/InputError.vue'
import BtnCTA from '@/Components/BtnCallToAction.vue'
import TextInput from '@/Components/Form/TextInput.vue'
import { Link, useForm } from '@inertiajs/inertia-vue3'
import { onMounted, ref } from 'vue'
import { useModal } from '@/store/modalStore'

const modal = useModal();

onMounted(() => {
    modal.close()
    modal.registrationClose()
})

const form = useForm({
    usu_email: '',
});

let code_error = ref(false)

const submit = () => {
    form.post(route('password.reset'), {
        onError: () => {
            code_error.value = true;
        },
        onFinish: () => {
            form.reset('email')
        }
    })
}

const clearErrors = () => {
    code_error.value = false
}
</script>

<template>
	<PageLayout>
		<PageHeader>
			<h2 class="text-white text-2xl font-bold leading-none md:text-3xl">Recuperar contraseña</h2>
		</PageHeader>

		<section id="forgot-password" class="px-6 py-14 3xl:px-0">
			<div class="max-w-5xl mx-auto">
				<div class="text-brand-green max-w-md">

					<div class="text-lg leading-tight select-none">
						Si ya estás dado o dada de alta, en el Colesterol Challenge o en ESTEVE ÁGORA.<br>
						En caso contrario <Link :herf="route('register')" class="font-bold">Regístrate</Link>
					</div>

					<form @submit.prevent="submit" class="max-w-xs mt-8">
						<div v-if="$page.props.flash.message"
							class="p-4 mb-4 text-sm text-green-700 bg-green-100 rounded-lg dark:bg-green-200 dark:text-green-800" role="alert">
							<span class="font-medium">
								{{ $page.props.flash.message }}
							</span>
						</div>

						<div v-if="(form.errors?.resetPassword && code_error)" class="my-7">
							<div class="bg-[#FFF7D8] px-5 py-3 select-none rounded-xl text-black">
								<div class="flex gap-x-10 items-center">
									<div class="leading-tight flex-1 text-black">
										<p v-if="form.errors?.resetPassword">{{ form.errors?.resetPassword }}</p>

										Por favor,
										<Link :href="route('contact')" class="text-primary font-bold hover:underline">
										Contacta
										</Link>
										con nosotros.
									</div>

									<div class="w-10">
										<button @click.prevent="clearErrors()" class="hover:opacity-90">
											<img src="/img/btn-close.svg" alt="cerrar" class="w-full">
										</button>
									</div>
								</div>
							</div>
						</div>

						<div class="">
							<TextInput
								id="email"
								type="email"
								placeholder="email"
								class="mt-1 block w-full"
								v-model="form.usu_email"
								required
								autofocus
								autocomplete="username"
								:rounded="true"
								/>

							<InputError class="mt-2" :message="form.errors.usu_email" />
						</div>

						<div class="mt-8" :class="{ 'opacity-25 pointer-events-none': form.processing }">
							<BtnCTA
								className="w-full"
								type="submit">
								<span>Entrar</span>
							</BtnCTA>
						</div>
					</form>

				</div>
			</div>
		</section>
	</PageLayout>
</template>