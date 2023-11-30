package ex1Client.service;

import java.util.List;

import org.springframework.beans.factory.annotation.Autowired;
import org.springframework.stereotype.Service;

import ex1Client.model.Client;
import ex1Client.repository.ClientRepository;

@Service
public class ClientService {
	@Autowired ClientRepository clientRepository;
	public List<Client> getAllclients(){
		return clientRepository.findAll();
	}
	public Client addClient(Client client) {
		return clientRepository.save(client);
	}
}
