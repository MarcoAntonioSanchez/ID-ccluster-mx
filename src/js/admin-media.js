document.addEventListener("DOMContentLoaded", () => {
  document.querySelectorAll(".ccluster-media-select").forEach((button) => {
    button.addEventListener("click", () => {
      const target = document.getElementById(button.dataset.target);

      const preview = document.getElementById(button.dataset.preview);

      const frame = wp.media({
        title: "Select Image",
        button: {
          text: "Use this image",
        },
        multiple: false,
        library: {
          type: "image",
        },
      });

      frame.on("select", () => {
        const attachment = frame.state().get("selection").first().toJSON();

        target.value = attachment.id;

        preview.innerHTML = "";

        const image = document.createElement("img");

        image.src = attachment.url;
        image.alt = "";

        preview.appendChild(image);
      });

      frame.open();
    });
  });

  document.querySelectorAll(".ccluster-media-remove").forEach((button) => {
    button.addEventListener("click", () => {
      const target = document.getElementById(button.dataset.target);

      const preview = document.getElementById(button.dataset.preview);

      target.value = "";

      preview.innerHTML = "";
    });
  });
});
