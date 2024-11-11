document.addEventListener('livewire:init', () => {
    Livewire.on('alert-sweet', (data) => {
        Swal.fire({
            icon: data.icon,
            html: `<span style="font-size: 16px;">${data.message}</span>`,
        });
    });
});