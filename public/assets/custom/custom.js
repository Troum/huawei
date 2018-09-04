function checkPhone(phone) {
    let velcom = /^\+37529|\+37544\d{7}$/,
        mts = /^\+37529|\+37533\d{7}$/,
        life = /^\+37525\d{7}$/;
    let m;
    return (m = velcom.exec(phone)) !== null || (m = mts.exec(phone)) !== null || (m = life.exec(phone)) !== null;
}

