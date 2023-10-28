export function isAdmin(roleId) {
    return roleId == 2
}

export function showImage() {
    return "/storage/";
}

export const hufCurrency = new Intl.NumberFormat('hu-HU', {
    style: 'currency',
    currency: 'HUF',
});