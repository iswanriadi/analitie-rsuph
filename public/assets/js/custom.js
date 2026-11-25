const csrfMeta = document.querySelector('meta[name="csrf-token"]');

const loader = {
  show() {
    document.getElementById("page-loader").classList.remove("d-none");
  },
  hide() {
    document.getElementById("page-loader").classList.add("d-none");
  },
};

function swalMessage(icon, text = "Terjadi kesalahan") {
  Swal.fire({
    icon: icon,
    text: text,
  });
}

function swalMessageWithRedirect(icon, text = "Terjadi kesalahan", url) {
  Swal.fire({
    icon: icon,
    text: text,
  }).then(() => {
    window.location.href = url;
  });
}

function swalKonfirmasiHapus() {
  return {
    text: "Yakin ingin menghapus?",
    showDenyButton: false,
    showCancelButton: true,
    confirmButtonText: "Ya",
    cancelButtonText: "Batal",
  };
}

async function swalKonfirmasi(text = "Yakin ingin menghapus?") {
  return await Swal.fire({
    text: text,
    showDenyButton: false,
    showCancelButton: true,
    confirmButtonText: "Ya",
    cancelButtonText: "Batal",
  });
}

function languageDt() {
  return {
    lengthMenu: "Menampilkan _MENU_ data",
    emptyTable: "Data tidak ditemukan",
    zeroRecords: "Data tidak ditemukan",
    info: "Data ke _START_-_END_ dari _TOTAL_ data",
    infoEmpty: "",
    paginate: {
      first: "Pertama",
      last: "Terakhir",
      next: ">",
      previous: "<",
    },
    search: "Cari:",
    processing: "Loading&mldr;",
  };
}

function languageSelect2(minInput) {
  return {
    noResults: function () {
      return "Data tidak ditemukan";
    },
    searching: function () {
      return "Mencari...";
    },
    inputTooShort: function () {
      return `Minimal ${minInput} karakter`;
    },
    errorLoading: function () {
      return "Gagal mencari data";
    },
  };
}

function postDownload(url, data = {}) {
  const form = document.createElement("form");
  form.method = "POST";
  form.action = url;
  form.target = "_blank";
  form.style.display = "none";

  Object.entries(data).forEach(([name, value]) => {
    if (Array.isArray(value)) {
      value.forEach((v) => {
        const input = document.createElement("input");
        input.type = "hidden";
        input.name = name + "[]";
        input.value = v;
        form.appendChild(input);
      });
    } else {
      const input = document.createElement("input");
      input.type = "hidden";
      input.name = name;
      input.value = value ?? "";
      form.appendChild(input);
    }
  });

  document.body.appendChild(form);
  form.submit();
  document.body.removeChild(form);
}
