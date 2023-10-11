$(function() {
    let INDEX = 0; 
    $("#chat-submit").click((e) => {
      e.preventDefault();
      const msg = $("#chat-input").val(); 
      if(msg.trim() === ''){
        return false;
      }

      // generate chat sisi kanan
      generate_message(msg, 'kanan', 'User');
    //   const buttons = [
    //       {
    //         name: 'Existing User',
    //         value: 'existing'
    //       },
    //       {
    //         name: 'New User',
    //         value: 'new'
    //       }
    //   ];
      
    
    setTimeout(() => {      
        // generate chat sisi kiri 
        generate_message(msg, 'kiri' ,'Diagnosa Bot');  
      }, 1000);
    });
    

    function generate_message(msg, type, nama) {
      if(type == 'kanan'){ 
        const textareaElement = document.getElementById('chat-input');
        textareaElement.value = '';
      }    
      INDEX++;
      const sekarang = new Date(); 
      const jam = sekarang.getHours();
      const menit = sekarang.getMinutes();
  
      let str = ` 
        <div id='cm-msg-${INDEX}' class="chat-msg ${type}">
          <div class="msg-img"
              style="background-image: ${type == 'kanan' ? 'url(assets/user2.png)' : 'url(assets/bot.jpg)'} ">
          </div>
          <div class="cm-msg-text">
            <div class="chat-msg-info">
              <div class="chat-msg-info-name">${nama}</div>
              <div class="chat-msg-info-time">${jam}:${menit}</div>
            </div>
            <div>${msg}</div>
          </div>
        </div>
      `;
      $(".chat-logs").append(str);
      $(`#cm-msg-${INDEX}`).hide().fadeIn(300);
      $(".chat-logs").stop().animate({ scrollTop: $(".chat-logs")[0].scrollHeight}, 1000);    
    }  
    
    // function generate_button_message(msg, buttons){    
    //   /* Buttons should be object array 
    //     [
    //       {
    //         name: 'Existing User',
    //         value: 'existing'
    //       },
    //       {
    //         name: 'New User',
    //         value: 'new'
    //       }
    //     ]
    //   */
    //   INDEX++;
    //   const btn_obj = buttons.map(button => `
    //     <li class="button">
    //       <a href="javascript:;" class="btn btn-primary chat-btn" chat-value="${button.value}">${button.name}</a>
    //     </li>
    //   `).join('');
    //   let str = `
    //     <div id='cm-msg-${INDEX}' class="chat-msg user">
    //       <span class="msg-avatar">
    //         <img src="https://image.crisp.im/avatar/operator/196af8cc-f6ad-4ef7-afd1-c45d5231387c/240/?1483361727745">
    //       </span>
    //       <div class="cm-msg-text">${msg}</div>
    //       <div class="cm-msg-button">
    //         <ul>${btn_obj}</ul>
    //       </div>
    //     </div>
    //   `;
    //   $(".chat-logs").append(str);
    //   $(`#cm-msg-${INDEX}`).hide().fadeIn(300);   
    //   $(".chat-logs").stop().animate({ scrollTop: $(".chat-logs")[0].scrollHeight}, 1000);
    //   $("#chat-input").attr("disabled", true);
    // }
     

  
})