export function isAdmin(roleId) {
    return roleId == 2
}

export function showImage() {
    return "/storage/";
}

export function changeSuppliableType(supType) {
    const word = 'App\\Models\\';
    let changed = supType.replace(word,'');

    switch(changed) {
        case 'Medicine':
            return 'Gyógyszer'
        case 'Equipment':
            return 'Felszerelés'
        case 'Nourishment':
            return 'Táplálék'
        default:
            return ''
      }
}

export const hufCurrency = new Intl.NumberFormat('hu-HU', {
    style: 'currency',
    currency: 'HUF',
});
