async function buscarCEP(idPrefix = '') {
    const cepInput = document.getElementById(`${idPrefix}cep`);
    const cepErro = document.getElementById('cepErro');
    const cep = cepInput.value.replace(/\D/g, '');

    cepErro.classList.add('hidden');
    cepErro.innerText = '';

    if (cep.length !== 8) {
        cepErro.innerText = 'CEP inválido. Informe 8 números.';
        cepErro.classList.remove('hidden');
        return;
    }

    try {
        const response = await fetch(`https://viacep.com.br/ws/${cep}/json/`);
        const data = await response.json();

        if (data.erro) {
            cepErro.innerText = 'CEP não encontrado.';
            cepErro.classList.remove('hidden');
            return;
        }

        document.getElementById(`${idPrefix}rua`).value = data.logradouro;
        document.getElementById(`${idPrefix}bairro`).value = data.bairro;
        document.getElementById(`${idPrefix}cidade`).value = data.localidade;
        document.getElementById(`${idPrefix}uf`).value = data.uf;

    } catch (error) {
        cepErro.innerText = 'Erro ao consultar o CEP. Tente novamente.';
        cepErro.classList.remove('hidden');
    }
}

document.getElementById('cep')?.addEventListener('blur', () => buscarCEP());
document.getElementById('btnBuscarCep')?.addEventListener('click', () => buscarCEP());
