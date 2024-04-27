
document.addEventListener("DOMContentLoaded", function() {
  const iframes = document.getElementsByClassName("iframeUpsell");

  for (const [index, iframe] of Object.entries(iframes)) {
    iframe.sandbox = "allow-same-origin allow-scripts allow-top-navigation";
    iframe.frameborder = "0";
    iframe.width = "100%";
    iframe.src = 'https://app.monetizze.com.br/1buyclick_incorporado.php?u=' + iframe.dataset.chave + '&i=' + index;
  }

  window.addEventListener('message', function(e) {
    const [event, index, height] = e.data;
    if (event == 'setHeightIframeUpsell') {
      if (iframes[index]) {
        iframes[index].height = height + "px";
      }
    } else if( event == 'sendUrlToOpen') {
      window.open(index, '_blank');
    }
  }, false)
});
