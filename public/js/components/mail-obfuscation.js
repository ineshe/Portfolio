// Builds mail links in the browser instead of shipping them in the markup.
// Parts are stored reversed and without the @, so address harvesters that
// scan the HTML for mailto: or a plain address pattern come up empty.
(function () {
  const slots = document.querySelectorAll(".js-mail");

  if (!slots.length) return;

  const reverse = (value) => value.split("").reverse().join("");

  slots.forEach((slot) => {
    const user = reverse(slot.dataset.user || "");
    const domain = reverse(slot.dataset.domain || "");

    if (!user || !domain) return;

    const address = `${user}@${domain}`;
    const link = document.createElement("a");
    link.href = `mailto:${address}`;
    link.textContent = address;

    slot.replaceChildren(link);
  });
})();
