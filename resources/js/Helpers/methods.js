export const defineTitle = (title) => {
    document.title = title + ' | IMPERIUM'
}

export const getdataParamsPagination = (data) => {
    return "?page=" + data.page + "&paginacion=" + data.paginacion + "&buscar=" + data.buscar;
}

export const getConfigHeader = () => {
    const tokenData = localStorage.getItem('token-api')
    const token = tokenData ? JSON.parse(tokenData).token : null

    return {
        headers: {
            'Accept': 'application/json',
            'X-Requested-With': 'XMLHttpRequest',
            ...(token ? { Authorization: 'JWT ' + token } : {}),
        }
    }
}
export const getConfigHeaderpdf = () => {
    let tokenData = localStorage.getItem('token-api');

    if (tokenData) {
        let decode = JSON.parse(tokenData);
        let token = decode.token;

        return {
            headers: {
                'Authorization': 'JWT ' + token
            },
            responseType: "blob"
        };
    }

    return {
        headers: {},
        responseType: "blob"
    };
};

export const getConfigHeaderPost = () => {
    if (localStorage.getItem('token-api')) {
        let decode = JSON.parse(localStorage.getItem('token-api') || "")
        let token = decode.access

        return {
            headers: {
                'Content-Type': 'application/json',
                'Accept': 'application/json',
                'Authorization': 'JWT ' + token
            }
        }
    }
}
export const onlyNumbers = (event) => {
    if (!/[0-9]/.test(event.key)) {
        event.preventDefault();
    }
}
export const onlyNumbersAndDecimal = (event) => {
    if (!/[0-9.]/.test(event.key)) {
        event.preventDefault();
    }

    if (event.target.value.includes('.') && event.key === '.') {
        event.preventDefault();
    }
}