async function buscarCEP(idPrefix = '') {
    const cepInput = document.getElementById(`${idPrefix}cep`);
    const cep = cepInput.value.replace(/\D/g, '');

    if (cep.length !== 8) return;

    const response = await fetch(`https://viacep.com.br/ws/${cep}/json/`);
    const data = await response.json();

    if (!data.erro) {
        document.getElementById(`${idPrefix}rua`).value = data.logradouro;
        document.getElementById(`${idPrefix}bairro`).value = data.bairro;
        document.getElementById(`${idPrefix}cidade`).value = data.localidade;
        document.getElementById(`${idPrefix}uf`).value = data.uf;
    }
}

document.getElementById('cep')?.addEventListener('blur', () => buscarCEP());

