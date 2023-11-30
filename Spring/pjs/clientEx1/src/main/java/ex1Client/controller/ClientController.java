package ex1Client.controller;

import java.util.List;

import org.springframework.beans.factory.annotation.Autowired;
import org.springframework.web.bind.annotation.GetMapping;
import org.springframework.web.bind.annotation.PostMapping;
import org.springframework.web.bind.annotation.RequestBody;
import org.springframework.web.bind.annotation.RequestMapping;
import org.springframework.web.bind.annotation.RestController;

import ex1Client.model.Client;
import ex1Client.service.ClientService;

@RestController
@RequestMapping("bank")
public class ClientController {
	@Autowired ClientService clientService;
	@GetMapping("/clients")
	public List<Client> getAllclients(){
		return clientService.getAllclients();
	}
	
	@PostMapping("/client")
	public Client addClient(@RequestBody Client client) {
		return clientService.addClient(client);
	}
	
}
