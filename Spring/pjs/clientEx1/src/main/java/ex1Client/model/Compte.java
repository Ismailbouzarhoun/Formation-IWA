package ex1Client.model;


import jakarta.persistence.Entity;
import jakarta.persistence.Id;
import jakarta.persistence.ManyToOne;
import lombok.AllArgsConstructor;
import lombok.Data;
import lombok.NoArgsConstructor;

@NoArgsConstructor @AllArgsConstructor @Data
@Entity
public class Compte {
	@Id
	public long id;
	public long numCompte;
	public float solde;
	@ManyToOne
	Client client;
}
